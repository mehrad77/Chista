<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package chista
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	
    <?php get_template_part( 'head'); ?>

    <link href="<?php echo esc_url( get_template_directory_uri() )  ?>/assets/css/404.css" media="all" rel="stylesheet" type="text/css">
    
</head>
<body <?php body_class(); ?>>

<div class="wall-overlay-gradient">


</div>
<div id="viewport">
    <div id="wall"></div>
</div>



<section id="primary" class="content-single content-area">
    <main id="main" class="site-main" role="main">

        <div class="error-404 not-found type-page">


            <div class="entry-content clearfix">

                <div class="card">
                    
                    <!-- #masthead -->
                    <div class="card-content white-text">
                        <span class="card-title">
                            <header id="masthead" class="site-header clearfix" role="banner">
                                <h1 class="page-title">
                                    <?php esc_html_e( '404: Page not found', 'chista' ); ?>
                                </h1>
                            </header>
                        </span>
                        <div class="content">
                            حتی چیزهایی که ما دوست داریم، گاهی اوقات می‌شکنند؛ دیگه یه لینک که این حرف‌ها رو نداره :)
                            <br/> پیوند درخواست‌شده پیدا نشد و این تمام چیزی است که من می‌دانم و از صبر و شکیبایی شما متشکرم.
                            <br/>
                            <br/> با‌این حال شما می‌توانید:
                            <ul>
                                <li>یا یک <a target="_blank" href="<?php echo get_site_url(); ?>/contact/"> ایمیل به من </a> بزنید و مشکل را با من در میان بگذارید؛</li>
                                <li>یا <a target="_blank" href="<?php echo get_site_url(); ?>/about/">دربارۀ من</a> بیشتر بخوانید؛</li>
                                <li>&nbsp;با استفاده از کادر جست&zwnj;وجوی زیر، در بلاگم جست&zwnj;وجو کنید یا به <a target="_blank" href="<?php echo get_home_url(); ?>" >صفحۀ اصلی</a> بروید.</li>
                            </ul>
                        </div>
                        <img src="<?php echo esc_url( get_template_directory_uri() )  ?>/assets/images/404.gif" class="" id="gif404" style="display:none;">
                        <div class="card-action">
                            <?php get_search_form(); ?>
                        </div>
                    </div>
                    
                    <div>



                    </div>

                </div>

    </main>
    <!-- #main -->
</section>
<!-- #primary -->


<!-- scripts start -->
<script src="<?php echo esc_url( get_template_directory_uri() )  ?>/assets/js/mootools.js" type="text/javascript">
</script>
<script src="<?php echo esc_url( get_template_directory_uri() )  ?>/assets/js/plugins.js" type="text/javascript">
</script>
<script type="text/javascript">
    $(function () {
        "use strict";

        function initAnim() {
            $(".border-top-1, .border-top-2, .border-bottom-1, .border-bottom-2").css(
                "width",
                "50%"
            );
            $(".border-left, .border-right").css("height", "100%");
            var heightLaterals = $(".border-right").height();
            $(".border-left, .border-right").css("height", "0px");
            $(".border-left, .border-right").css("top", heightLaterals / 2 + "px");
            var widthFramework = $(".border-top-1").width();
            var widthTop = $(".center-space-top span").width();
            var widthBottom = $(".center-space-bottom span").width();
            var calculateTop = widthFramework - widthTop / 2 - 8;
            var calculateBottom = widthFramework - widthBottom / 2 - 8;
            $(".border-top-1, .border-top-2, .border-bottom-1, .border-bottom-2")
                .delay(1400)
                .css("width", "0%");
            $(".border-left, .border-right")
                .delay(1400)
                .animate(
                    {
                        height: heightLaterals + "px",
                        top: "0px"
                    },
                    600,
                    function () {
                        $(".border-left, .border-right").css({
                            height: "100%"
                        });
                        $(".border-top-1, .border-top-2").animate(
                            {
                                width: calculateTop - 25 + "px"
                            },
                            600
                        );
                        $(".border-bottom-1, .border-bottom-2").animate(
                            {
                                width: calculateBottom - 25 + "px"
                            },
                            600
                        );
                        $(
                            ".center-space-top, .center-space-bottom, .titleOT, nav, h6, #slidePositionIndicator"
                        )
                            .stop(true, true)
                            .delay(400)
                            .animate(
                                {
                                    opacity: 1
                                },
                                1800
                            );
                    }
                );
        }
        function init() {
            $(
                ".center-space-top, .center-space-bottom, .titleOT, nav, h6, #slidePositionIndicator"
            ).css("opacity", "0");
            $(".border-top-1, .border-top-2, .border-bottom-1, .border-bottom-2").css(
                "width",
                "0%"
            );
            $(".border-left, .border-right").css("height", "0px");
        }
    });
    // the Wall
    window.addEvent("domready", function () {
        var imagewall = [
            <?php
                $args = array( 'posts_per_page' => '21' );
                $recent_posts = new WP_Query($args);
                while( $recent_posts->have_posts() ) { 
                
                $recent_posts->the_post() ; 
                
                if ( has_post_thumbnail() ) {

                    /* grab the url for the full size featured image */
                    $featured_img_url = get_the_post_thumbnail_url(get_the_ID()); 
                    echo '[ "' . esc_url($featured_img_url)  . '", [["' . esc_url($featured_img_url)  . '", " <a target=\"_blank\" href=\"' . esc_url(get_permalink()) . '\">' . get_the_title() . '</a>"]] ],';
                    }
                }
                
                wp_reset_postdata();

            ?>
        ];
        var maxLength = 20;
        var wallFluid = new Wall("wall", {
            draggable: true,
            slideshow: true, // options: true, false
            speed: 1000,
            showDuration: 4000,
            transition: Fx.Transitions.Quad.easeOut,
            inertia: true,
            autoposition: true,
            width: 420,
            height: 200,
            rangex: [-100, 100],
            rangey: [-100, 100],
            callOnUpdate: function (items) {
                var root = Math.ceil(Math.sqrt(maxLength));
                document.id("wall").setStyle("margin-left", 0);
                var i = 0;
                (function () {
                    try {
                        var position =
                            (Math.abs(items[i].y) % root) * root + Math.abs(items[i].x) % root;
                        if (position > maxLength) {
                            position = Math.floor(Math.random() * maxLength);
                        }
                        var file = imagewall[position][0];
                        var img = new Element("img[src=" + file + "]");
                        img
                            .inject(items[i].node)
                            .fade("hide")
                            .fade("in");
                        var list = new Element("ul");
                        list.setProperty("class", "slideshow");
                        for (var j = 0; j < imagewall[position][1].length; j++) {
                            var slide = new Element("li");
                            new Element("img", {
                                src: imagewall[position][1][j][0]
                            }).inject(slide);
                            var desc = new Element("span", {
                                html: imagewall[position][1][j][1]
                            });
                            var div = new Element("div");
                            div.setProperty("class", "wall-item-description");
                            desc.inject(div);
                            div.inject(slide);
                            slide.inject(list);
                        }
                        list.inject(items[i].node);
                        var stop = false;
                        var firstSlide = true;
                        items[i].node.addEvents({
                            mouseenter: function (event) {
                                list.getChildren("li").setStyles({
                                    visibility: "hidden",
                                    opacity: 0
                                });
                                stop = false;
                                if (imagewall[position][1].length) {
                                    (function (item) {
                                        item.fade("in");
                                        if (firstSlide) {
                                            delay = 1000;
                                            firstSlide = false;
                                        } else {
                                            delay = 2000;
                                        }
                                        if (item.getNext("li") != null) {
                                            var tmpslide = arguments.callee;
                                            (function () {
                                                item.fade("out");
                                                if (!stop) tmpslide(item.getNext("li"));
                                            }.delay(delay));
                                        } else if (item.getSiblings("li").length > 0) {
                                            var tmpslide = arguments.callee;
                                            (function () {
                                                item.fade("out");
                                                if (!stop) tmpslide(item.getSiblings("li").pop());
                                            }.delay(delay));
                                        }
                                    })(new Element(list.getFirst("li")));
                                    img.fade("out");
                                }
                                return false;
                            },
                            mouseleave: function () {
                                stop = true;
                                firstSlide = true;
                                if (imagewall[position][1].length) {
                                    list.getChildren("li").fade("out");
                                    img.fade("in");
                                }
                            }
                        });
                        i++;
                        if (i < items.length) {
                            var tmp = arguments.callee;
                            (function () {
                                tmp();
                            }.delay(40));
                        } else {
                        }
                    } catch (e) { }
                })();
            }
        });
        window.setTimeout(function () {
            wallFluid.initWall();
        }, 1800);
    });

// GOOGLE ANALYTICS [for demonstration purposes only]
// intentionally REMOVED!

</script>
<!-- scripts end -->

<?php wp_footer(); ?>
</body>
</html>