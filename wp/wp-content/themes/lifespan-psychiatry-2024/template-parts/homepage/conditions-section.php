<?php
/**
 * Homepage Conditions Section
 *
 * @package LifespanPsychiatry
 */
?>

<section class="conditions-section bg-gray-100 py-16">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12">Conditions We Treat</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Depression -->
            <div class="bg-white rounded-lg overflow-hidden shadow-md transition-all hover:shadow-lg">
                <div class="aspect-w-16 aspect-h-9 bg-cover bg-center" style="background-image: url('<?php echo get_theme_file_uri('assets/images/placeholder.jpg'); ?>');">
                    <div class="w-full h-full bg-primary bg-opacity-60 flex items-end p-6">
                        <h3 class="text-white text-2xl font-semibold">Depression & Mood</h3>
                    </div>
                </div>
                <div class="p-6">
                    <p class="text-gray-700 mb-4">
                        Depression affects how you feel, think and behave and can lead to a variety of emotional and physical problems.
                    </p>
                    <a href="/condition/depression/" class="text-primary font-medium hover:underline flex items-center">
                        Learn more
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </div>
            
            <!-- Anxiety -->
            <div class="bg-white rounded-lg overflow-hidden shadow-md transition-all hover:shadow-lg">
                <div class="aspect-w-16 aspect-h-9 bg-cover bg-center" style="background-image: url('<?php echo get_theme_file_uri('assets/images/placeholder.jpg'); ?>');">
                    <div class="w-full h-full bg-primary bg-opacity-60 flex items-end p-6">
                        <h3 class="text-white text-2xl font-semibold">Anxiety & Panic</h3>
                    </div>
                </div>
                <div class="p-6">
                    <p class="text-gray-700 mb-4">
                        Excessive worry, fear, and nervousness that may interfere with daily activities.
                    </p>
                    <a href="/condition/anxiety/" class="text-primary font-medium hover:underline flex items-center">
                        Learn more
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </div>
            
            <!-- ADHD -->
            <div class="bg-white rounded-lg overflow-hidden shadow-md transition-all hover:shadow-lg">
                <div class="aspect-w-16 aspect-h-9 bg-cover bg-center" style="background-image: url('<?php echo get_theme_file_uri('assets/images/placeholder.jpg'); ?>');">
                    <div class="w-full h-full bg-primary bg-opacity-60 flex items-end p-6">
                        <h3 class="text-white text-2xl font-semibold">ADHD</h3>
                    </div>
                </div>
                <div class="p-6">
                    <p class="text-gray-700 mb-4">
                        Persistent pattern of inattention, hyperactivity, and impulsivity that interferes with functioning or development.
                    </p>
                    <a href="/condition/adhd/" class="text-primary font-medium hover:underline flex items-center">
                        Learn more
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </div>
            
            <!-- View All Link -->
            <div class="md:col-span-2 lg:col-span-3 text-center mt-8">
                <a href="/what-we-treat/" class="inline-block px-6 py-3 bg-primary text-white font-medium rounded-md hover:bg-primary-dark transition shadow-md">
                    View All Conditions We Treat
                </a>
            </div>
        </div>
    </div>
</section>



















