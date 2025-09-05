# Lifespan Psychiatry & Wellness - WordPress Theme

A modern, accessible WordPress theme for mental health practices, specifically designed for Lifespan Psychiatry & Wellness. Built with Tailwind CSS, Alpine.js, and optimized for healthcare providers.

## Features

- ✅ **Modern Design System**: Tailwind CSS with custom healthcare-focused color palette
- ✅ **Responsive Layout**: Mobile-first design that works on all devices
- ✅ **Accessibility Ready**: WCAG 2.1 AA compliance with skip links, screen reader support
- ✅ **Interactive Components**: Alpine.js for modern UI interactions
- ✅ **Automated Setup**: One-click theme activation with content generation
- ✅ **Performance Optimized**: Font preconnects, efficient CSS/JS loading
- ✅ **SEO Ready**: Structured markup, meta tags, and semantic HTML

## Quick Start

### 1. Theme Setup
```bash
# Navigate to theme directory
cd wp/wp-content/themes/lifespan-psychiatry-2024/

# Install dependencies and build assets
./run-setup.bat
```

### 2. WordPress Setup
1. Activate the "Lifespan Psychiatry 2024" theme in WordPress
2. Go to **Appearance → Theme Setup**
3. Click "Run Theme Setup" to auto-generate pages and menus

### 3. Development Workflow
```bash
# For active development (watches for changes)
npm run dev

# For production build (minified)
npm run build
```

## Project Structure

```
lifespan-psychiatry/
├── wp/                                    # WordPress installation
│   └── wp-content/
│       └── themes/
│           └── lifespan-psychiatry-2024/  # Main theme directory
│               ├── assets/                # CSS, JS, and image assets
│               ├── template-parts/        # Modular template components
│               ├── inc/                   # PHP includes and functionality
│               ├── setup-theme.php        # Automated setup script
│               ├── package.json           # Node.js dependencies
│               ├── tailwind.config.js     # Tailwind CSS configuration
│               └── run-setup.bat          # Windows setup script
├── generators/                            # Content and component generators
├── README.md                              # This file
└── .gitignore                            # Git ignore rules
```

## Theme Components

### Homepage Sections
- **Hero Section**: Main call-to-action with professional messaging
- **Trust Indicators**: Accessibility, affordability, and effectiveness highlights
- **Services Overview**: Psychiatry, Talk Therapy, and Medication Management
- **Conditions Section**: Depression, Anxiety, and ADHD treatment areas
- **CTA Section**: Appointment booking with crisis information

### Navigation & Layout
- **Responsive Header**: Mobile-friendly navigation with Alpine.js interactions
- **Footer**: Multi-column layout with contact info and social links
- **Accessibility**: Skip links, proper heading hierarchy, and ARIA attributes

## Development

### CSS Framework
- **Tailwind CSS 3.x**: Utility-first CSS framework
- **Custom Design Tokens**: Healthcare-focused color palette and typography
- **Responsive Design**: Mobile-first approach with breakpoint-specific utilities

### JavaScript
- **Alpine.js**: Lightweight framework for UI interactions
- **No jQuery**: Modern JavaScript approach for better performance

### Build System
- **NPM Scripts**: Simple development and production workflows
- **Live Compilation**: Watch mode for active development
- **Minification**: Production-ready CSS output

## Customization

### Colors
Primary colors can be adjusted in `tailwind.config.js`:
```javascript
colors: {
  primary: {
    DEFAULT: '#0055B7',  // Main brand color
    dark: '#00408a',     // Darker variant
    light: '#4DA9FF',    // Lighter variant
  }
}
```

### Typography
Font choices in `tailwind.config.js`:
```javascript
fontFamily: {
  sans: ['Inter', 'system-ui', ...],
  heading: ['Poppins', 'Inter', ...],
}
```

## Deployment

### Production Checklist
1. Run `npm run build` to compile production CSS
2. Test all interactive components
3. Verify accessibility features
4. Check responsive design on all breakpoints
5. Validate contact forms and CTAs

### Version Control
This project uses Git for version control. Regular commits are made after significant feature implementations to maintain project history and prevent duplicate work.

## Support

For technical questions or customization requests, refer to the project documentation or contact the development team.

## License

This theme is developed specifically for Lifespan Psychiatry & Wellness. All rights reserved.

---

**Last Updated**: December 2024  
**Theme Version**: 1.0.0  
**WordPress Compatibility**: 6.0+
