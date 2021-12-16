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
$id = 'Photo-cards' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'Photo-cards';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assing defaults.
$heading = get_field('heading') ?: 'Text here...';
$text = get_field('text') ?: 'Text here...';
$image = get_field('image') ?: 'Image here...';

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
<div class="py-12">
        <div class="md:container md:mx-auto">

            <div class="mt-20">

                <!-- Right column -->

                <div class="space-y-10 md:space-y-0 md:grid md:grid-cols-2 md:gap-x-7 md:gap-y-10">
                    <div class="relative">
                        <div class="w-full h-full shadow-lg mb-4">
                            <img class="object-center object-cover w-full h-full" src="#" alt="photo">
                        </div>
                        <div class="w-full h-full shadow-lg">
                            <img class="object-center object-cover w-full h-full" src="#" alt="photo">
                        </div>
                        <div>
                            <h3 class="pt-1 mt-8 mr-44 ml-2 text-3xl leading-6 font-semibold text-gray-900 text-left md:text-left"><?php echo $heading; ?></h3>
                        </div>
                        <div class="mt-7 ml-2 mb-2 text-xs text-black text-left md:text-left">
                        <InnerBlocks />
                        </div>
                    </div>

                    <!-- Right column end -->

                    <!-- Left column -->

                    <div class="relative">
                        <div class="mt-1 ml-2 mb-6 text-xs text-black text-center md:text-left">
                            <div class="invisible md:visible mt-1 ml-2 mb-6 text-xs text-black text-left md:text-left">
                            <InnerBlocks />
                            </div>
                        </div>
                        <div>
                            <h3 class="invisible md:visible pt-1 mt-2 mb-8 mr-44 ml-2 text-3xl leading-6 font-black text-gray-900 text-left md:text-left">Like a Local</h3>
                        </div>

                        <div class="w-full h-full shadow-lg mb-4">
                            <img class="object-center object-cover w-full h-full" src="#" alt="photo">
                        </div>

                        <div class="w-full h-full shadow-lg">
                            <img class="object-center object-cover w-full h-full" src="#" alt="photo">
                        </div>

                        <!-- Mobile version for Left column -->

                        <div class="mt-10 ml-2 mb-6 text-xs text-black text-left md:text-left">
                            <div class="visible md:invisible mt-1 mb-6 text-xs text-black text-left md:text-left">
                            <InnerBlocks />
                            </div>

                            <div>
                                <h3 class="visible md:invisible pt-1 mt-2 mb-8 mr-44 text-3xl leading-6 font-black text-gray-900 text-left md:text-left"><?php echo $heading; ?></h3>
                            </div>
                        </div>
                    </div>

                    <!-- Left column end -->
                </div>
            </div>
        </div>
    </div>