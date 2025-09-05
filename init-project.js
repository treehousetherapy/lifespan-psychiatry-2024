#!/usr/bin/env node

/**
 * Project Initialization Script for LifespanPsychiatryMN.com
 * 
 * This script automates the setup of the entire project structure including:
 * 1. Directory structure creation
 * 2. WordPress core download and setup
 * 3. Child theme structure creation
 * 4. Development environment configuration
 */

const fs = require('fs');
const path = require('path');
const { execSync } = require('child_process');
const https = require('https');
const { createWriteStream } = require('fs');
const { createUnzip } = require('zlib');

// Configuration
const config = {
  projectRoot: 'C:/Users/treeh/lifespan-psychiatry',
  wpDir: 'wp',
  themeName: 'lifespan-psychiatry-2024',
  wpVersion: 'latest',
  parentTheme: 'twentytwentyfour',
  devDependencies: {
    'vite': '^5.0.0',
    'tailwindcss': '^3.3.5',
    'alpinejs': '^3.13.0',
    'postcss': '^8.4.31',
    'autoprefixer': '^10.4.16',
    '@vitejs/plugin-react': '^4.2.0',
  }
};

// Ensure project root exists
console.log(`\n🚀 Initializing LifespanPsychiatryMN.com project...\n`);

// Create base directories
const directories = [
  path.join(config.projectRoot),
  path.join(config.projectRoot, 'assets'),
  path.join(config.projectRoot, 'assets', 'css'),
  path.join(config.projectRoot, 'assets', 'js'),
  path.join(config.projectRoot, 'assets', 'images'),
  path.join(config.projectRoot, 'assets', 'fonts'),
  path.join(config.projectRoot, config.wpDir),
  path.join(config.projectRoot, 'scripts'),
  path.join(config.projectRoot, 'config'),
  path.join(config.projectRoot, 'generators'),
];

// Create directory structure
console.log('📁 Creating directory structure...');
directories.forEach(dir => {
  if (!fs.existsSync(dir)) {
    fs.mkdirSync(dir, { recursive: true });
    console.log(`   Created: ${dir}`);
  } else {
    console.log(`   Already exists: ${dir}`);
  }
});

// Download WordPress
console.log('\n📥 Setting up WordPress...');
const downloadWordPress = async () => {
  const wpZipPath = path.join(config.projectRoot, 'wordpress.zip');
  const wpUrl = `https://wordpress.org/latest.zip`;
  
  console.log(`   Downloading WordPress ${config.wpVersion}...`);
  
  const file = createWriteStream(wpZipPath);
  
  return new Promise((resolve, reject) => {
    https.get(wpUrl, (response) => {
      response.pipe(file);
      file.on('finish', () => {
        file.close(() => {
          console.log('   WordPress download complete.');
          resolve(wpZipPath);
        });
      });
    }).on('error', (err) => {
      fs.unlink(wpZipPath, () => {
        reject(err);
      });
    });
  });
};

// Extract WordPress
const extractWordPress = (wpZipPath) => {
  console.log('   Extracting WordPress...');
  // Using the command line for extraction as it's more reliable cross-platform
  try {
    // Different commands for Windows vs Unix-like systems
    if (process.platform === 'win32') {
      execSync(`powershell Expand-Archive -Path "${wpZipPath}" -DestinationPath "${config.projectRoot}/temp"`, { stdio: 'inherit' });
    } else {
      execSync(`unzip "${wpZipPath}" -d "${config.projectRoot}/temp"`, { stdio: 'inherit' });
    }
    
    // Move files from wordpress subfolder to wp directory
    if (process.platform === 'win32') {
      execSync(`robocopy "${config.projectRoot}/temp/wordpress" "${config.projectRoot}/${config.wpDir}" /E /MOV`, { stdio: 'inherit' });
    } else {
      execSync(`mv "${config.projectRoot}/temp/wordpress/"* "${config.projectRoot}/${config.wpDir}/"`, { stdio: 'inherit' });
    }
    
    // Clean up
    fs.rmdirSync(`${config.projectRoot}/temp`, { recursive: true });
    fs.unlinkSync(wpZipPath);
    
    console.log('   WordPress extraction complete.');
  } catch (error) {
    console.error('   Error extracting WordPress:', error.message);
  }
};

// Create child theme structure
const setupChildTheme = () => {
  console.log('\n🎨 Setting up child theme...');
  
  const themeDir = path.join(config.projectRoot, config.wpDir, 'wp-content', 'themes', config.themeName);
  
  // Create theme directories
  const themeDirectories = [
    themeDir,
    path.join(themeDir, 'assets'),
    path.join(themeDir, 'assets', 'css'),
    path.join(themeDir, 'assets', 'js'),
    path.join(themeDir, 'assets', 'images'),
    path.join(themeDir, 'assets', 'fonts'),
    path.join(themeDir, 'template-parts'),
    path.join(themeDir, 'template-parts', 'components'),
    path.join(themeDir, 'template-parts', 'blocks'),
    path.join(themeDir, 'inc'),
    path.join(themeDir, 'page-templates'),
  ];
  
  themeDirectories.forEach(dir => {
    if (!fs.existsSync(dir)) {
      fs.mkdirSync(dir, { recursive: true });
      console.log(`   Created: ${dir}`);
    }
  });
  
  // Create style.css
  const styleCss = `/*
Theme Name: Lifespan Psychiatry 2024
Theme URI: https://lifespanpsychiatrymn.com/
Description: A custom theme for Lifespan Psychiatry MN, based on the Geode Health website design.
Author: Your Name
Author URI: https://example.com/
Template: ${config.parentTheme}
Version: 1.0.0
Text Domain: lifespan-psychiatry
*/

/* Theme styles will be loaded via build process */
`;

  fs.writeFileSync(path.join(themeDir, 'style.css'), styleCss);
  console.log('   Created: style.css');
  
  // Create functions.php
  const functionsPhp = `<?php
/**
 * Lifespan Psychiatry Theme functions and definitions
 */

// Define constants
define('LIFESPAN_VERSION', '1.0.0');
define('LIFESPAN_THEME_DIR', get_stylesheet_directory());
define('LIFESPAN_THEME_URI', get_stylesheet_directory_uri());

/**
 * Enqueue styles and scripts
 */
function lifespan_enqueue_assets() {
    // Enqueue parent theme styles
    wp_enqueue_style(
        'parent-style', 
        get_template_directory_uri() . '/style.css'
    );
    
    // Enqueue child theme styles
    wp_enqueue_style(
        'lifespan-style',
        LIFESPAN_THEME_URI . '/assets/css/main.css',
        array('parent-style'),
        LIFESPAN_VERSION
    );
    
    // Enqueue Alpine.js
    wp_enqueue_script(
        'alpine-js',
        LIFESPAN_THEME_URI . '/assets/js/alpine.min.js',
        array(),
        LIFESPAN_VERSION,
        true
    );
    
    // Enqueue main scripts
    wp_enqueue_script(
        'lifespan-scripts',
        LIFESPAN_THEME_URI . '/assets/js/main.js',
        array('alpine-js'),
        LIFESPAN_VERSION,
        true
    );
}
add_action('wp_enqueue_scripts', 'lifespan_enqueue_assets');

/**
 * Include custom functionality
 */
require_once LIFESPAN_THEME_DIR . '/inc/custom-post-types.php';
require_once LIFESPAN_THEME_DIR . '/inc/custom-fields.php';
require_once LIFESPAN_THEME_DIR . '/inc/template-functions.php';
`;

  fs.writeFileSync(path.join(themeDir, 'functions.php'), functionsPhp);
  console.log('   Created: functions.php');
  
  // Create empty include files
  const includeFiles = [
    'custom-post-types.php',
    'custom-fields.php',
    'template-functions.php'
  ];
  
  includeFiles.forEach(file => {
    const filePath = path.join(themeDir, 'inc', file);
    const fileContent = `<?php
/**
 * ${file} - Will be populated by the generator scripts
 */

// This file will be populated by the respective generator scripts
`;
    fs.writeFileSync(filePath, fileContent);
    console.log(`   Created: inc/${file}`);
  });
  
  // Create tailwind.config.js
  const tailwindConfig = `module.exports = {
  content: [
    './template-parts/**/*.php',
    './page-templates/**/*.php',
    './assets/js/**/*.js',
    './*.php',
  ],
  theme: {
    extend: {
      colors: {
        // Will be updated with Geode Health colors
        'primary': '#0055B7',
        'secondary': '#4DA9FF',
        'dark': '#333333',
      },
      fontFamily: {
        // Will be updated with Geode Health fonts
        'sans': ['Inter', 'sans-serif'],
        'heading': ['Poppins', 'sans-serif'],
      },
    },
  },
  plugins: [],
}
`;

  fs.writeFileSync(path.join(themeDir, 'tailwind.config.js'), tailwindConfig);
  console.log('   Created: tailwind.config.js');
};

// Initialize package.json and development tools
const setupDevEnvironment = () => {
  console.log('\n⚙️ Setting up development environment...');
  
  // Create package.json
  const packageJson = {
    name: "lifespan-psychiatry",
    version: "1.0.0",
    description: "Lifespan Psychiatry MN Website",
    scripts: {
      "dev": "vite",
      "build": "vite build",
      "generate:component": "node generators/component-generator.js",
      "generate:page": "node generators/page-generator.js",
      "generate:cpt": "node generators/cpt-generator.js",
      "generate:acf": "node generators/acf-generator.js"
    },
    devDependencies: config.devDependencies
  };
  
  fs.writeFileSync(
    path.join(config.projectRoot, 'package.json'),
    JSON.stringify(packageJson, null, 2)
  );
  console.log('   Created: package.json');
  
  // Create vite.config.js
  const viteConfig = `import { defineConfig } from 'vite';

export default defineConfig({
  root: './',
  build: {
    outDir: './wp/wp-content/themes/lifespan-psychiatry-2024/assets',
    emptyOutDir: false,
    rollupOptions: {
      input: {
        main: './assets/js/main.js',
        style: './assets/css/main.css',
      },
      output: {
        entryFileNames: 'js/[name].js',
        chunkFileNames: 'js/[name].js',
        assetFileNames: (info) => {
          if (info.name.endsWith('.css')) {
            return 'css/[name][extname]';
          }
          return 'assets/[name][extname]';
        },
      },
    },
  },
  css: {
    postcss: {
      plugins: [
        require('tailwindcss')('./wp/wp-content/themes/lifespan-psychiatry-2024/tailwind.config.js'),
        require('autoprefixer'),
      ],
    },
  },
});
`;

  fs.writeFileSync(path.join(config.projectRoot, 'vite.config.js'), viteConfig);
  console.log('   Created: vite.config.js');
  
  // Create base CSS file
  const cssContent = `@tailwind base;
@tailwind components;
@tailwind utilities;

/* Custom styles will be added here */
`;

  fs.writeFileSync(path.join(config.projectRoot, 'assets', 'css', 'main.css'), cssContent);
  console.log('   Created: assets/css/main.css');
  
  // Create base JS file
  const jsContent = `// Import Alpine.js
import Alpine from 'alpinejs';

// Initialize Alpine
window.Alpine = Alpine;
Alpine.start();

// Global site functionality
document.addEventListener('DOMContentLoaded', function() {
  // Site functionality will be added here
  console.log('Lifespan Psychiatry site initialized');
});
`;

  fs.writeFileSync(path.join(config.projectRoot, 'assets', 'js', 'main.js'), jsContent);
  console.log('   Created: assets/js/main.js');
  
  // Add .gitignore
  const gitignore = `# Ignore WordPress core files
/wp/*
!/wp/wp-content/
/wp/wp-content/*
!/wp/wp-content/themes/
/wp/wp-content/themes/*
!/wp/wp-content/themes/lifespan-psychiatry-2024/

# Dependency directories
/node_modules/

# Environment files
.env

# Build files
/dist/

# OS generated files
.DS_Store
Thumbs.db
`;

  fs.writeFileSync(path.join(config.projectRoot, '.gitignore'), gitignore);
  console.log('   Created: .gitignore');
};

// Create generator placeholders
const setupGenerators = () => {
  console.log('\n🛠️ Setting up generator scripts...');
  
  const generatorsPath = path.join(config.projectRoot, 'generators');
  
  // Component Generator
  const componentGenerator = `#!/usr/bin/env node
/**
 * Component Generator
 * 
 * Generates a new component from templates based on Geode Health design system
 * Usage: node component-generator.js ComponentName
 */

const fs = require('fs');
const path = require('path');

// Get component name from command line
const componentName = process.argv[2];

if (!componentName) {
  console.error('Please provide a component name');
  process.exit(1);
}

// Format component name
const formattedName = componentName.charAt(0).toLowerCase() + componentName.slice(1);
const className = \`component-\${formattedName}\`;

// Component template
const componentTemplate = \`<?php
/**
 * Component: \${componentName}
 * 
 * @package LifespanPsychiatry
 */

// Extract parameters with defaults
$title = $args['title'] ?? '';
$content = $args['content'] ?? '';
?>

<div class="\${className}">
  <?php if ($title): ?>
    <h2 class="component-title"><?php echo esc_html($title); ?></h2>
  <?php endif; ?>
  
  <?php if ($content): ?>
    <div class="component-content">
      <?php echo wp_kses_post($content); ?>
    </div>
  <?php endif; ?>
</div>
\`;

// Create the component file
const componentPath = path.join(
  __dirname, 
  '../wp/wp-content/themes/lifespan-psychiatry-2024/template-parts/components', 
  \`\${formattedName}.php\`
);

fs.writeFileSync(componentPath, componentTemplate);
console.log(\`✅ Component \${componentName} created at \${componentPath}\`);
`;

  fs.writeFileSync(path.join(generatorsPath, 'component-generator.js'), componentGenerator);
  console.log('   Created: generators/component-generator.js');
  
  // Page Generator
  const pageGenerator = `#!/usr/bin/env node
/**
 * Page Template Generator
 * 
 * Generates a new page template based on Geode Health design system
 * Usage: node page-generator.js PageName
 */

const fs = require('fs');
const path = require('path');

// Get page name from command line
const pageName = process.argv[2];

if (!pageName) {
  console.error('Please provide a page name');
  process.exit(1);
}

// Format page name
const formattedName = pageName.toLowerCase().replace(/\\s+/g, '-');
const pageTitle = pageName
  .replace(/-/g, ' ')
  .replace(/\\b\\w/g, c => c.toUpperCase());

// Page template
const pageTemplate = \`<?php
/**
 * Template Name: \${pageTitle} Page
 * 
 * @package LifespanPsychiatry
 */

get_header();
?>

<main id="main" class="site-main">
  <div class="container mx-auto px-4 py-12">
    <h1 class="text-4xl font-bold mb-8">\${pageTitle}</h1>
    
    <!-- Page content will be populated here -->
    <div class="page-content">
      <?php the_content(); ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>
\`;

// Create the page template file
const templatePath = path.join(
  __dirname, 
  '../wp/wp-content/themes/lifespan-psychiatry-2024/page-templates', 
  \`page-\${formattedName}.php\`
);

fs.writeFileSync(templatePath, pageTemplate);
console.log(\`✅ Page template \${pageTitle} created at \${templatePath}\`);
`;

  fs.writeFileSync(path.join(generatorsPath, 'page-generator.js'), pageGenerator);
  console.log('   Created: generators/page-generator.js');
  
  // CPT Generator
  const cptGenerator = `#!/usr/bin/env node
/**
 * Custom Post Type Generator
 * 
 * Generates a new custom post type based on configuration
 * Usage: node cpt-generator.js PostTypeName "Post Type Label" "Post Type Description"
 */

const fs = require('fs');
const path = require('path');

// Get post type info from command line
const postTypeName = process.argv[2];
const postTypeLabel = process.argv[3] || postTypeName;
const postTypeDesc = process.argv[4] || \`\${postTypeLabel} custom post type\`;

if (!postTypeName) {
  console.error('Please provide a post type name');
  process.exit(1);
}

// Format post type name
const formattedName = postTypeName.toLowerCase().replace(/\\s+/g, '_');
const pluralLabel = \`\${postTypeLabel}s\`; // Simple pluralization, customize as needed

// CPT registration function
const cptFunction = \`
/**
 * Register Custom Post Type: \${postTypeLabel}
 */
function register_\${formattedName}_post_type() {
    $labels = array(
        'name'               => __('\${pluralLabel}', 'lifespan-psychiatry'),
        'singular_name'      => __('\${postTypeLabel}', 'lifespan-psychiatry'),
        'menu_name'          => __('\${pluralLabel}', 'lifespan-psychiatry'),
        'add_new'            => __('Add New', 'lifespan-psychiatry'),
        'add_new_item'       => __('Add New \${postTypeLabel}', 'lifespan-psychiatry'),
        'edit_item'          => __('Edit \${postTypeLabel}', 'lifespan-psychiatry'),
        'new_item'           => __('New \${postTypeLabel}', 'lifespan-psychiatry'),
        'view_item'          => __('View \${postTypeLabel}', 'lifespan-psychiatry'),
        'search_items'       => __('Search \${pluralLabel}', 'lifespan-psychiatry'),
        'not_found'          => __('No \${pluralLabel} found', 'lifespan-psychiatry'),
        'not_found_in_trash' => __('No \${pluralLabel} found in trash', 'lifespan-psychiatry'),
        'parent_item_colon'  => __('Parent \${postTypeLabel}:', 'lifespan-psychiatry'),
        'all_items'          => __('All \${pluralLabel}', 'lifespan-psychiatry'),
    );

    $args = array(
        'labels'              => $labels,
        'description'         => __('\${postTypeDesc}', 'lifespan-psychiatry'),
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'rewrite'             => array('slug' => '\${formattedName}'),
        'capability_type'     => 'post',
        'has_archive'         => true,
        'hierarchical'        => false,
        'menu_position'       => null,
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon'           => 'dashicons-admin-post',
        'show_in_rest'        => true,
    );

    register_post_type('\${formattedName}', $args);
}
add_action('init', 'register_\${formattedName}_post_type');
\`;

// Read the existing file
const cptFilePath = path.join(
  __dirname, 
  '../wp/wp-content/themes/lifespan-psychiatry-2024/inc/custom-post-types.php'
);

// Append the new CPT function
fs.appendFileSync(cptFilePath, cptFunction);
console.log(\`✅ Custom Post Type \${postTypeLabel} added to custom-post-types.php\`);

// Create template files
const archiveTemplate = \`<?php
/**
 * The template for displaying \${pluralLabel} archive
 *
 * @package LifespanPsychiatry
 */

get_header();
?>

<main id="main" class="site-main">
  <div class="container mx-auto px-4 py-12">
    <h1 class="text-4xl font-bold mb-8">\${pluralLabel}</h1>
    
    <?php if (have_posts()) : ?>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php while (have_posts()) : the_post(); ?>
          <div class="card bg-white rounded-lg shadow-md overflow-hidden">
            <?php if (has_post_thumbnail()) : ?>
              <div class="aspect-w-16 aspect-h-9">
                <?php the_post_thumbnail('medium_large', array('class' => 'object-cover w-full h-full')); ?>
              </div>
            <?php endif; ?>
            <div class="p-6">
              <h2 class="text-xl font-semibold mb-2">
                <a href="<?php the_permalink(); ?>" class="text-primary hover:underline">
                  <?php the_title(); ?>
                </a>
              </h2>
              <div class="text-gray-700 mb-4">
                <?php the_excerpt(); ?>
              </div>
              <a href="<?php the_permalink(); ?>" class="inline-block px-4 py-2 bg-primary text-white rounded hover:bg-primary-dark transition">
                Learn More
              </a>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
      
      <div class="pagination mt-8">
        <?php the_posts_pagination(); ?>
      </div>
    <?php else : ?>
      <p>No \${pluralLabel} found.</p>
    <?php endif; ?>
  </div>
</main>

<?php get_footer(); ?>
\`;

const singleTemplate = \`<?php
/**
 * The template for displaying single \${postTypeLabel}
 *
 * @package LifespanPsychiatry
 */

get_header();
?>

<main id="main" class="site-main">
  <div class="container mx-auto px-4 py-12">
    <?php while (have_posts()) : the_post(); ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header mb-8">
          <h1 class="text-4xl font-bold"><?php the_title(); ?></h1>
        </header>

        <?php if (has_post_thumbnail()) : ?>
          <div class="featured-image mb-8">
            <?php the_post_thumbnail('large', array('class' => 'w-full h-auto rounded-lg')); ?>
          </div>
        <?php endif; ?>

        <div class="entry-content prose max-w-none">
          <?php the_content(); ?>
        </div>
      </article>
    <?php endwhile; ?>
  </div>
</main>

<?php get_footer(); ?>
\`;

// Create the template directories if they don't exist
const templatesDir = path.join(__dirname, '../wp/wp-content/themes/lifespan-psychiatry-2024/template-parts', formattedName);
if (!fs.existsSync(templatesDir)) {
  fs.mkdirSync(templatesDir, { recursive: true });
}

// Write the template files
fs.writeFileSync(path.join(templatesDir, 'archive.php'), archiveTemplate);
fs.writeFileSync(path.join(templatesDir, 'single.php'), singleTemplate);

console.log(\`✅ Created archive and single templates for \${formattedName}\`);
`;

  fs.writeFileSync(path.join(generatorsPath, 'cpt-generator.js'), cptGenerator);
  console.log('   Created: generators/cpt-generator.js');
  
  // ACF Generator
  const acfGenerator = `#!/usr/bin/env node
/**
 * ACF Fields Generator
 * 
 * Generates ACF fields for custom post types
 * Usage: node acf-generator.js PostTypeName FieldGroupName
 */

const fs = require('fs');
const path = require('path');

// Get info from command line
const postTypeName = process.argv[2];
const fieldGroupName = process.argv[3] || \`\${postTypeName} Fields\`;

if (!postTypeName) {
  console.error('Please provide a post type name');
  process.exit(1);
}

// Format names
const formattedPostType = postTypeName.toLowerCase().replace(/\\s+/g, '_');
const formattedGroupName = fieldGroupName.toLowerCase().replace(/\\s+/g, '_');

// ACF field group registration
const acfFieldGroup = \`
/**
 * Register ACF Field Group: \${fieldGroupName}
 */
function register_\${formattedGroupName}_fields() {
    if (function_exists('acf_add_local_field_group')) {
        acf_add_local_field_group(array(
            'key' => 'group_\${formattedGroupName}',
            'title' => '\${fieldGroupName}',
            'fields' => array(
                array(
                    'key' => 'field_\${formattedGroupName}_subtitle',
                    'label' => 'Subtitle',
                    'name' => 'subtitle',
                    'type' => 'text',
                    'instructions' => 'Enter a subtitle for this \${postTypeName}',
                    'required' => 0,
                ),
                array(
                    'key' => 'field_\${formattedGroupName}_details',
                    'label' => 'Details',
                    'name' => 'details',
                    'type' => 'wysiwyg',
                    'instructions' => 'Enter additional details',
                    'required' => 0,
                    'tabs' => 'all',
                    'toolbar' => 'full',
                    'media_upload' => 1,
                ),
                // Add more fields as needed
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => '\${formattedPostType}',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => true,
            'description' => '',
            'show_in_rest' => true,
        ));
    }
}
add_action('acf/init', 'register_\${formattedGroupName}_fields');
\`;

// Read the existing file
const acfFilePath = path.join(
  __dirname, 
  '../wp/wp-content/themes/lifespan-psychiatry-2024/inc/custom-fields.php'
);

// Append the new ACF field group
fs.appendFileSync(acfFilePath, acfFieldGroup);
console.log(\`✅ ACF Field Group \${fieldGroupName} added to custom-fields.php\`);
`;

  fs.writeFileSync(path.join(generatorsPath, 'acf-generator.js'), acfGenerator);
  console.log('   Created: generators/acf-generator.js');
};

// Main function to execute the script
const main = async () => {
  try {
    // Download and extract WordPress
    const wpZipPath = await downloadWordPress();
    extractWordPress(wpZipPath);
    
    // Set up child theme and development environment
    setupChildTheme();
    setupDevEnvironment();
    setupGenerators();
    
    console.log('\n✅ Project initialization complete!');
    console.log('\nNext steps:');
    console.log('1. cd C:/Users/treeh/lifespan-psychiatry');
    console.log('2. npm install');
    console.log('3. npm run dev');
    console.log('\nUse the generator scripts to create components, pages, custom post types, and ACF fields:');
    console.log('- npm run generate:component ComponentName');
    console.log('- npm run generate:page PageName');
    console.log('- npm run generate:cpt PostTypeName "Post Type Label"');
    console.log('- npm run generate:acf PostTypeName "Field Group Name"');
    
  } catch (error) {
    console.error('Error during project initialization:', error);
  }
};

// Run the script
main();

