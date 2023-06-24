<?php
  /* Template Name: Style Guide */
  /**
   * The template for displaying the Style Guide
   *
   * @package Fire
   */

  get_header();
?>
	<main id="primary" class="site-main">
    <div class="container mx-auto mt-10 mb-20">
      <div>
        <div class="flex">
          <div class="flex items-center justify-center w-32 h-20 mb-4 mr-4 text-white bg-blue-1">blue-1</div>
          <div class="flex items-center justify-center w-32 h-20 mb-4 mr-4 text-white bg-blue-2">blue-2</div>
          <div class="flex items-center justify-center w-32 h-20 mb-4 mr-4 text-white bg-orange-1">orange-1</div>
          <div class="flex items-center justify-center w-32 h-20 mb-4 mr-4 text-white bg-orange-2">orange-2</div>
        </div>
      </div>

      <hr>

      <h1>h1: Lorem ipsum dolor sit amet consectetur adipisicing elit.</h1>
      <h2>h2: Lorem ipsum dolor sit amet consectetur adipisicing elit.</h2>
      <h3>h3: Lorem ipsum dolor sit amet consectetur adipisicing elit.</h3>
      <h4>h4: Lorem ipsum dolor sit amet consectetur adipisicing elit.</h4>
      <h5>h5: Lorem ipsum dolor sit amet consectetur adipisicing elit.</h5>
      <h6>h6: Lorem ipsum dolor sit amet consectetur adipisicing elit.</h6>

      <h1 class="mb-6 heading-1">heading-1: Lorem ipsum dolor sit amet</h1>
      <h1 class="mb-6 heading-2">heading-2: Lorem ipsum dolor sit amet</h1>
      <h1 class="mb-6 heading-3">heading-3: Lorem ipsum dolor sit amet</h1>
      <h1 class="mb-6 heading-4">heading-4: Lorem ipsum dolor sit amet</h1>
      <h1 class="mb-6 heading-5">heading-5: Lorem ipsum dolor sit amet</h1>
      <h1 class="mb-6 heading-6">heading-6: Lorem ipsum dolor sit amet</h1>
      <h1 class="mb-6 kicker">kicker: Lorem ipsum dolor sit amet</h1>

      <hr>

      <p class="mb-6 text-2xl">text-2xl paragraph: Lorem ipsum dolor sit amet consectetur, adipisicing elit. Reprehenderit, voluptatibus perferendis recusandae error unde repudiandae. Iste ab eius quibusdam inventore?</p>
      <p class="mb-6 text-xl">text-xl paragraph: Lorem ipsum dolor sit amet consectetur, adipisicing elit. Reprehenderit, voluptatibus perferendis recusandae error unde repudiandae. Iste ab eius quibusdam inventore?</p>
      <p class="mb-6 text-lg">text-lg paragraph: Lorem ipsum dolor sit amet consectetur, adipisicing elit. Reprehenderit, voluptatibus perferendis recusandae error unde repudiandae. Iste ab eius quibusdam inventore?</p>
      <p class="mb-6 text-base">text-base paragraph: Lorem ipsum dolor sit amet consectetur, adipisicing elit. Reprehenderit, voluptatibus perferendis recusandae error unde repudiandae. Iste ab eius quibusdam inventore?</p>

      <hr>

      <div class="flex flex-wrap gap-4 items-center justify-start my-8">
        <button type="button" class="button">Button</button>
        <button type="button" class="button-blue">Button Blue</button>
        <button type="button" class="button-white">Button White</button>
        <button type="button" class="button-outline">Button Outline</button>
        <button type="button" class="button-blue-outline">Button Blue Outline</button>
        <button type="button" class="button-white-outline">Button White Outline</button>
      </div>

      <div class="flex flex-wrap gap-4 items-center justify-start my-8 -mx-4 p-4 bg-gray-800">
        <button type="button" class="button">Button</button>
        <button type="button" class="button-blue">Button Blue</button>
        <button type="button" class="button-white">Button White</button>
        <button type="button" class="button-outline">Button Outline</button>
        <button type="button" class="button-blue-outline">Button Blue Outline</button>
        <button type="button" class="button-white-outline">Button White Outline</button>
      </div>

      <hr>


      <div class="flex">
        <a href="#" class="link link-primary">primary</a>
      </div>

    </div>
  </main>

<?php
  get_footer();
?>