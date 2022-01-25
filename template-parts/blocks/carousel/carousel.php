<?php

/**
 * Two columns Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'carousel' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'carousel';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assing defaults.
$name_1 = get_field('name_1') ?: 'Text here...';
$name_2 = get_field('name_2') ?: 'Text here...';
$name_3 = get_field('name_3') ?: 'Text here...';
$title_1 = get_field('title_1') ?: 'Text here...';
$title_2 = get_field('title_2') ?: 'Text here...';
$title_3 = get_field('title_3') ?: 'Text here...';
$image_1 = get_field('image_1');
$image_2 = get_field('image_2');
$image_3 = get_field('image_3');
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
<div class="container swiper-container">
        <div class="swiper-wrapper">

            <div class="swiper-slide">
                <div>
                    <figure>
                            <img class="object-center object-cover w-full h-full" src="<?php echo $image_1; ?>" alt="photo">
                            </figure>
                    <div>
                        <h1 class="mt-3 text-gray-800 text-2xl font-bold my-2 text-center"><?php echo $name_1; ?></h1>
                        <p class="text-xs mb-2 text-center"><?php echo $title_1; ?></p>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div>
                    <div>
                        <h1 class="mt-3 text-gray-800 text-2xl font-bold my-2 text-center"><?php echo $name_2; ?></h1>
                        <p class="text-xs mb-2 text-center"><?php echo $title_2; ?></p>
                    </div>
                    <figure>
                    <img class="object-center object-cover w-full h-full" src="<?php echo $image_2; ?>" alt="photo">
                    </figure>
                </div>
            </div>

            <div class="swiper-slide">

                <div>
                    <img class="object-center object-cover w-full h-full" src="<?php echo $image_3; ?>" alt="photo">
                    <div>
                        <h1 class="mt-3 text-gray-800 text-2xl font-bold my-2 text-center"><?php echo $name_3; ?></h1>
                        <p class="text-xs mb-2 text-center"><?php echo $title_3; ?></p>
                    </div>
                </div>
            </div>

        </div>

        <div class="hidden md:flex swiper-button-next w-16 h-16 text-xs text-black"></div>
        <div class="hidden md:flex swiper-button-prev w-16 h-16 text-xs text-black"></div>
    </div>

