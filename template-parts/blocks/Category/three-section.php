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
$id = 'gallery' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'gallery';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assing defaults.
$heading = get_field('heading') ?: 'Text here...';
$sub_heading = get_field('sub_heading') ?: 'Text here...';
$image = get_field('image');
$title = get_field('title') ?: 'Title here...';
$text = get_field('text') ?: 'Text here...';
$image_2 = get_field('image_2');
$title_2 = get_field('title_2') ?: 'Title here...';
$text_2 = get_field('text_2') ?: 'Text here...';
$image_3 = get_field('image_3');
$title_3 = get_field('title_3') ?: 'Title here...';
$text_3 = get_field('text_3') ?: 'Text here...';


?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">

<div class="max-w-screen-xl px-4 mx-auto md:px-8">
        <div class="mb-10 md:mb-16">
            <h2 class="mb-4 text-2xl font-bold text-center text-gray-800 lg:text-3xl md:mb-6">
            <?php echo $heading; ?>
            </h2>

            <p class="max-w-screen-md mx-auto text-center text-gray-500 md:text-lg">
            <?php echo $sub_heading; ?>
            </p>
        </div>

        <div class="grid gap-4 md:grid-cols-3">
            <div class="p-4 shadow">
                <figure>
                    <img src="<?php echo $image; ?>" class="object-center object-cover" class="object-cover object-center w-full h-full">
                </figure>

                <div class="flex flex-col items-center justify-center">
                    <div class="font-bold text-black md:text-lg"><?php echo $title; ?></div>
                    <p class="mb-3 text-sm text-gray-500 md:text-base md:mb-4 text-center">
                    <?php echo $text; ?>
                    </p>
                </div>
            </div>
            <div class="p-4 shadow">
                <figure>
                    <img src="<?php echo $image_2; ?>" class="object-center object-cover" class="object-cover object-center w-full h-full">
                </figure>

                <div class="flex flex-col items-center justify-center">
                    <div class="font-bold text-black md:text-lg"><?php echo $title_2; ?></div>
                    <p class="mb-3 text-sm text-gray-500 md:text-base md:mb-4 text-center">
                    <?php echo $text_2; ?>
                    </p>
                </div>
            </div>

            <div class="p-4 shadow">
                <figure>
                    <img src="<?php echo $image_3; ?>" class="object-center object-cover" class="object-cover object-center w-full h-full">
                </figure>
                <div class="flex flex-col items-center justify-center">
                    <div class="font-bold text-black md:text-lg"><?php echo $title_3; ?></div>
                    <p class="mb-3 text-sm text-gray-500 md:text-base md:mb-4 text-center">
                    <?php echo $text_3; ?>
                    </p>
                </div>
            </div>
        </div>
    </div>