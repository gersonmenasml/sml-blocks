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
$id = 'custom-gallery' . $block['id'];
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
$text = get_field('text') ?: 'Text here...';
$title = get_field('title') ?: 'Text here...';
$title2 = get_field('title2') ?: 'Text here...';
$description = get_field('description') ?: 'Text here...';
$description2 = get_field('description2') ?: 'Text here...';
$image = get_field('image');
$image2 = get_field('image2');
$button_text = get_field('button_text');
$button_text_2 = get_field('button_text_2');

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">

            
<div class="min-h-screen  flex flex-wrap items-center justify-start">
        <div class="mr-0 lg:mr-0 -space-y-16 md:py-0 md:max-w-max 5 z-40  shadow-none sm:shadow-none  lg:shadow-xl xl:shadow-xl mr-0 lg:mr-80">
            <img src="<?php echo $image; ?>" alt="">
        </div>

         <div class="visible md:invisible lg:hidden py-6 sm:py-6 md:py-6 lg:py-6 xl:py-4 px-8 w-full md:max-w-min sm:w-full bg-white z-50">

            <div class="text-left py-4 px-14">
                <h1 class="text-gray-700 text-4xl font-black mr-0 lg:mr-2 text-center"><?php echo $title; ?></h1>
            </div>

            <div class="h-px bg-gray-200"></div>

            <div class="text-center mt-3">
                <p class="text-sm text-gray-400">
                <?php echo $description; ?>
                </p>
            </div>

            <button class="w-full mt-6 mb-3 py-2 text-white font-semibold bg-gray-700 hover:shadow-xl duration-200 hover:bg-gray-800"><?php echo $button_text; ?></button>

        </div>

         <!-- Mobile version for our people section -->

        <div class="invisible md:visible py-6 sm:py-8 px-10 w-full md:max-w-min sm:w-full bg-white z-50  shadow-none sm:shadow-none md:shadow-xl lg:shadow-xl xl:shadow-xl relative md:absolute right-20">

            <div class="text-left py-4 px-14">
                <h1 class="text-gray-700 text-4xl text-center font-black"><?php echo $title; ?></h1>
            </div>

            <div class="h-px bg-gray-200"></div>

            <div class="text-center mt-3">
                <p class="text-sm text-gray-400">
                <?php echo $description; ?>
                </p>
            </div>

            <button class="w-full mt-6 mb-3 py-2 text-white font-semibold bg-gray-700 hover:shadow-xl duration-200 hover:bg-gray-800"><?php echo $button_text; ?></button>

        </div>
    </div>

    <!-- Our People section end -->

    <!-- Our Community section -->

    <div class="min-h-screen flex flex-wrap items-center justify-end">

        <div class="invisible md:visible -space-y-80 md:space-y-6 py-6 px-10 w-full md:max-w-min sm:w-full bg-white z-50  shadow-none sm:shadow-none md:shadow-xl lg:shadow-xl xl:shadow-xl relative md:absolute left-20">

            <div class="text-left py-4 px-14">
                <h1 class="text-gray-700 text-4xl font-black text-center"><?php echo $title2; ?></h1>
            </div>

            <div class="h-px bg-gray-200"></div>

            <div class="text-center mt-3">
                <p class="text-sm text-gray-400">
                <?php echo $description2; ?>
                </p>
            </div>

            <button class="w-full mt-6 mb-3 py-2 text-white font-semibold bg-gray-700 hover:shadow-xl duration-200 hover:bg-gray-800"><?php echo $button_text_2; ?></button>

        </div>

        <div class="mr-0 lg:mr-0 -space-y-16 md:py-0 md:max-w-max 5 z-40  shadow-none sm:shadow-none  lg:shadow-xl xl:shadow-xl ml-0 lg:ml-80">
            <img src="<?php echo $image2; ?>" alt="">
        </div>

        <!-- Mobile version for our community section -->

        <div class="visible md:invisible lg:hidden py-6 sm:py-6 md:py-6 lg:py-6 xl:py-4 px-8 w-full md:max-w-min sm:w-full bg-white z-50">

            <div class="text-left py-4 px-14">
                <h1 class="text-gray-700 text-4xl font-black mr-0 lg:mr-2 text-center"><?php echo $title2; ?></h1>
            </div>

            <div class="h-px bg-gray-200"></div>

            <div class="text-center mt-3">
                <p class="text-sm text-gray-400">
                <?php echo $description2; ?>
                </p>
            </div>

            <button class="w-full mt-6 mb-3 py-2 text-white font-semibold bg-gray-700 hover:shadow-xl duration-200 hover:bg-gray-800"><?php echo $button_text_2; ?></button>

        </div>

    </div>