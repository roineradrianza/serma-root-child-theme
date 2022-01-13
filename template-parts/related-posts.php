<?php

/**

 * ****************************************************************************

 *

 *

 *   https://support.wpshop.ru/docs/general/child-themes/

 *

 * *****************************************************************************

 *

 * @package root

 */



if ( is_page() ) {

    $related_count_mod = root_get_option( 'structure_page_related' );

} else {

    $related_count_mod = root_get_option( 'structure_single_related' );

}

$related_yarpp_enabled = apply_filters( THEME_SLUG . '_yarpp_enabled', false );





if ( ! empty( $related_count_mod ) && ! $related_yarpp_enabled ) {

    $post__not_in = [];

    $related_articles = [];

    $related_posts_category_id_exclude = [];



    $related_post_taxonomy_order    = root_get_option( 'related_post_taxonomy_order' );

    $related_posts_exclude          = root_get_option( 'related_posts_exclude' );

    $related_posts_category_exclude = root_get_option( 'related_posts_category_exclude' );



    if ( ! empty( $related_posts_exclude ) ) {

        $related_posts_exclude = explode( ',', $related_posts_exclude );



        foreach ( $related_posts_exclude as $key => $value ) {

            $post__not_in[] = $related_posts_exclude[$key];

        }

    }



    if ( ! empty( $related_posts_category_exclude ) ) {

        $related_posts_category_exclude = explode( ',', $related_posts_category_exclude );



        foreach ( $related_posts_category_exclude as $key => $value ) {

            $related_posts_category_id_exclude[$key] = '-' . $related_posts_category_exclude[$key];

        }

    }



    $related_count = 6;

    if ( is_numeric( $related_count_mod ) && $related_count_mod > -1 ) {

        if ( $related_count_mod > 50 ) $related_count_mod = 50;

        $related_count = $related_count_mod;

    }



    if ( is_single() ) {

        $related_posts_ids = get_post_meta( $post->ID, 'related_posts_ids', true );



        // если указаны посты - набираем их

        if ( ! empty( $related_posts_ids ) ) {

            $related_posts_id_exp = explode( ',', $related_posts_ids );



            if ( is_array( $related_posts_id_exp ) ) {

                $related_posts_ids = array_map( 'trim', $related_posts_id_exp );

            } else {

                $related_posts_ids = [ $related_posts_ids ];

            }



            if ( ! empty( $related_posts_exclude ) ) {

                $related_posts_ids = array_diff( $related_posts_ids, $related_posts_exclude );

            }



            if ( ! empty( $related_posts_ids ) ) {

                $related_articles = get_posts( [

                    'posts_per_page' => $related_count,

                    'post__in'       => $related_posts_ids,

                    'post__not_in'   => [ $post->ID ],

                ] );

            }

        }



        // если не хватило, добираем из категории

        if ( count( $related_articles ) < $related_count ) {

            // сколько осталось постов

            $delta = $related_count - count( $related_articles );



            // убираем текущий пост + уже выведенные

            $post__not_in[] = $post->ID;

            foreach ( $related_articles as $article ) {

                $post__not_in[] = $article->ID;

            }



            if ( $related_post_taxonomy_order == 'categories' ) {

                // подготавливаем категории

                global $post;

                $category_ids = [];

                $categories = get_the_category( $post->ID );

                if ( $categories ) {

                    foreach ( $categories as $_category ) {

                        if ( ! empty( $related_posts_category_exclude ) ) {

                            if ( ! in_array( $_category->term_id, $related_posts_category_exclude ) ) $category_ids[] = $_category->term_id;

                        } else {

                            $category_ids[] = $_category->term_id;

                        }

                    }

                }



                if ( ! empty( $category_ids ) ) {

                    $related_articles_taxonomy = get_posts(

                        apply_filters( THEME_SLUG . '_related_get_posts_category_args', [

                            'posts_per_page' => $delta,

                            'category__in'   => $category_ids,

                            'post__not_in'   => $post__not_in,

                        ] )

                    );

                }

            } else {

                // подготавливаем метки

                global $post;

                $tag_ids = [];

                $tags = get_the_tags( $post->ID );

                if ( $tags ) {

                    foreach ( $tags as $tag ) {

                        $tag_ids[] = $tag->term_taxonomy_id;

                    }

                }



                $related_articles_taxonomy = get_posts(

                    apply_filters( THEME_SLUG . '_related_get_posts_category_args', [

                        'posts_per_page' => $delta,

                        'category'       => $related_posts_category_id_exclude,

                        'tag__in'        => $tag_ids,

                        'post__not_in'   => $post__not_in,

                    ] )

                );

            }



            if ( ! empty( $related_articles_taxonomy ) ) $related_articles = array_merge( $related_articles, $related_articles_taxonomy );



            // если не хватило, добираем рандом

            if ( count( $related_articles ) < $related_count ) {

                // сколько осталось постов

                $delta = $related_count - count( $related_articles );



                // убираем текущий пост + уже выведенные

                $post__not_in[] = $post->ID;

                foreach ( $related_articles as $article ) {

                    $post__not_in[] = $article->ID;

                }



                $related_articles_second = get_posts(

                    apply_filters( THEME_SLUG . '_related_get_posts_rand_args', [

                        'posts_per_page' => $delta,

                        'category'       => $related_posts_category_id_exclude,

                        'orderby'        => 'rand',

                        'post__not_in'   => $post__not_in,

                    ] )

                );



                // если все ок, объединяем

                if ( ! empty( $related_articles_second ) ) $related_articles = array_merge( $related_articles, $related_articles_second );

            }

        }

    } else {

        if ( ! empty( $post->ID ) ) {

            $related_posts_ids = get_post_meta( $post->ID, 'related_posts_ids', true );

        }



        // если указаны посты - набираем их

        if ( ! empty( $related_posts_ids ) ) {

            $related_posts_id_exp = explode( ',', $related_posts_ids );



            if ( is_array( $related_posts_id_exp ) ) {

                $related_posts_ids = array_map( 'trim', $related_posts_id_exp );

            } else {

                $related_posts_ids = [ $related_posts_ids ];

            }



            if ( ! empty( $related_posts_exclude ) ) {

                $related_posts_ids = array_diff( $related_posts_ids, $related_posts_exclude );

            }



            if ( ! empty( $related_posts_ids ) ) {

                $related_articles = get_posts( [

                    'posts_per_page' => $related_count,

                    'post__in'       => $related_posts_ids,

                    'post__not_in'   => $post__not_in,

                ] );

            }

        }



        // если не хватило, добираем рандом

        if ( count( $related_articles ) < $related_count ) {

            // сколько осталось постов

            $delta = $related_count - count( $related_articles );



            // убираем уже выведенные

            foreach ( $related_articles as $article ) {

                $post__not_in[] = $article->ID;

            }



            $related_articles_second = get_posts(

                apply_filters( THEME_SLUG . '_related_get_posts_rand_args', [

                    'posts_per_page' => $delta,

                    'category'       => $related_posts_category_id_exclude,

                    'orderby'        => 'rand',

                    'post__not_in'   => $post__not_in,

                ] )

            );



            // если все ок, объединяем

            if ( ! empty( $related_articles_second ) ) $related_articles = array_merge( $related_articles, $related_articles_second );

        }

    }



    if ( ! empty( $related_articles ) ) {

        echo '<div class="b-related">';



            do_action( THEME_SLUG . '_related_before' );



            echo '
            <div class="b-related__header d-flex align-center">
                <div class="col-6">
                    <h3 class="text-left heading-text">' . 
                    apply_filters( THEME_SLUG . '_related_title', __( 'Related articles', THEME_TEXTDOMAIN ) ) . '
                    </h3>
                </div>
                <div class="col-6 mt-1">
                    <hr>
                </div>
            </div>';



            do_action( THEME_SLUG . '_related_after_title' );



            echo '<div class="b-related__items d-flex">';

                foreach ( $related_articles as $post ) {

                    setup_postdata( $post );

                    get_template_part( 'template-parts/posts/content', 'card-without-micro' );

                }

                wp_reset_postdata();

            echo '</div>';



            do_action( THEME_SLUG . '_related_after' );



        echo '</div>';

    }



} else {



    /**

     * If yarpp enabled

     */

    if ( function_exists( 'related_posts' ) && $related_yarpp_enabled ) {

        related_posts();

    }



}