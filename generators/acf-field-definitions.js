/**
 * ACF Field Group Definitions
 * 
 * Field group definitions for the ACF generator
 */

// Field group definitions
const fieldGroups = [
  {
    name: 'service',
    title: 'Service Fields',
    fields: [
      {
        name: 'service_subtitle',
        label: 'Service Subtitle',
        type: 'text',
        instructions: 'A brief subtitle or tagline for this service'
      },
      {
        name: 'service_icon',
        label: 'Service Icon',
        type: 'image',
        instructions: 'An icon representing this service'
      },
      {
        name: 'service_short_description',
        label: 'Short Description',
        type: 'textarea',
        instructions: 'A brief description for use in cards and listings'
      },
      {
        name: 'service_details',
        label: 'Service Details',
        type: 'wysiwyg',
        instructions: 'Detailed information about this service'
      },
      {
        name: 'service_benefits',
        label: 'Service Benefits',
        type: 'repeater',
        instructions: 'Key benefits of this service',
        sub_fields: [
          {
            name: 'benefit_title',
            label: 'Benefit Title',
            type: 'text'
          },
          {
            name: 'benefit_description',
            label: 'Benefit Description',
            type: 'textarea'
          }
        ]
      },
      {
        name: 'service_process',
        label: 'Service Process',
        type: 'repeater',
        instructions: 'Steps in the service process',
        sub_fields: [
          {
            name: 'process_title',
            label: 'Step Title',
            type: 'text'
          },
          {
            name: 'process_description',
            label: 'Step Description',
            type: 'textarea'
          }
        ]
      },
      {
        name: 'service_cta',
        label: 'Call to Action',
        type: 'group',
        sub_fields: [
          {
            name: 'cta_title',
            label: 'CTA Title',
            type: 'text',
            default_value: 'Ready to get started?'
          },
          {
            name: 'cta_text',
            label: 'CTA Text',
            type: 'textarea',
            default_value: 'Schedule your appointment today.'
          },
          {
            name: 'cta_button_text',
            label: 'Button Text',
            type: 'text',
            default_value: 'Book Appointment'
          },
          {
            name: 'cta_button_link',
            label: 'Button Link',
            type: 'page_link',
            default_value: '/contact'
          }
        ]
      }
    ],
    location: [
      [
        {
          param: 'post_type',
          operator: '==',
          value: 'service'
        }
      ]
    ]
  },
  {
    name: 'condition',
    title: 'Condition Fields',
    fields: [
      {
        name: 'condition_subtitle',
        label: 'Condition Subtitle',
        type: 'text',
        instructions: 'A brief subtitle for this condition'
      },
      {
        name: 'condition_short_description',
        label: 'Short Description',
        type: 'textarea',
        instructions: 'A brief description for use in cards and listings'
      },
      {
        name: 'condition_symptoms',
        label: 'Common Symptoms',
        type: 'repeater',
        instructions: 'List common symptoms of this condition',
        sub_fields: [
          {
            name: 'symptom',
            label: 'Symptom',
            type: 'text'
          },
          {
            name: 'symptom_description',
            label: 'Description',
            type: 'textarea'
          }
        ]
      },
      {
        name: 'condition_treatments',
        label: 'Treatment Options',
        type: 'relationship',
        instructions: 'Select services that treat this condition',
        post_type: ['service']
      },
      {
        name: 'condition_resources',
        label: 'Additional Resources',
        type: 'repeater',
        instructions: 'Additional resources for this condition',
        sub_fields: [
          {
            name: 'resource_title',
            label: 'Resource Title',
            type: 'text'
          },
          {
            name: 'resource_description',
            label: 'Resource Description',
            type: 'textarea'
          },
          {
            name: 'resource_link',
            label: 'Resource Link',
            type: 'url'
          }
        ]
      },
      {
        name: 'condition_cta',
        label: 'Call to Action',
        type: 'group',
        sub_fields: [
          {
            name: 'cta_title',
            label: 'CTA Title',
            type: 'text',
            default_value: 'Ready to get help?'
          },
          {
            name: 'cta_text',
            label: 'CTA Text',
            type: 'textarea',
            default_value: 'Our specialists can help you overcome this condition.'
          },
          {
            name: 'cta_button_text',
            label: 'Button Text',
            type: 'text',
            default_value: 'Book Appointment'
          },
          {
            name: 'cta_button_link',
            label: 'Button Link',
            type: 'page_link',
            default_value: '/contact'
          }
        ]
      }
    ],
    location: [
      [
        {
          param: 'post_type',
          operator: '==',
          value: 'condition'
        }
      ]
    ]
  },
  {
    name: 'provider',
    title: 'Provider Fields',
    fields: [
      {
        name: 'provider_credentials',
        label: 'Credentials',
        type: 'text',
        instructions: 'Provider\'s credentials (e.g., MD, PhD, LMFT)'
      },
      {
        name: 'provider_title',
        label: 'Job Title',
        type: 'text',
        instructions: 'Provider\'s job title'
      },
      {
        name: 'provider_specialties',
        label: 'Specialties',
        type: 'taxonomy',
        instructions: 'Provider\'s specialties',
        taxonomy: 'provider_specialty'
      },
      {
        name: 'provider_conditions',
        label: 'Conditions Treated',
        type: 'relationship',
        instructions: 'Conditions this provider treats',
        post_type: ['condition']
      },
      {
        name: 'provider_services',
        label: 'Services Offered',
        type: 'relationship',
        instructions: 'Services this provider offers',
        post_type: ['service']
      },
      {
        name: 'provider_education',
        label: 'Education',
        type: 'repeater',
        instructions: 'Provider\'s educational background',
        sub_fields: [
          {
            name: 'degree',
            label: 'Degree',
            type: 'text'
          },
          {
            name: 'institution',
            label: 'Institution',
            type: 'text'
          },
          {
            name: 'year',
            label: 'Year',
            type: 'number'
          }
        ]
      },
      {
        name: 'provider_biography',
        label: 'Biography',
        type: 'wysiwyg',
        instructions: 'Provider\'s detailed biography'
      },
      {
        name: 'provider_insurance',
        label: 'Accepted Insurance',
        type: 'relationship',
        instructions: 'Insurance plans accepted by this provider',
        post_type: ['insurance']
      },
      {
        name: 'provider_languages',
        label: 'Languages Spoken',
        type: 'repeater',
        instructions: 'Languages spoken by this provider',
        sub_fields: [
          {
            name: 'language',
            label: 'Language',
            type: 'text'
          },
          {
            name: 'proficiency',
            label: 'Proficiency',
            type: 'select',
            choices: {
              'native': 'Native',
              'fluent': 'Fluent',
              'conversational': 'Conversational',
              'basic': 'Basic'
            }
          }
        ]
      },
      {
        name: 'provider_booking_link',
        label: 'Booking Link',
        type: 'url',
        instructions: 'Direct link to book with this provider'
      }
    ],
    location: [
      [
        {
          param: 'post_type',
          operator: '==',
          value: 'provider'
        }
      ]
    ]
  },
  {
    name: 'testimonial',
    title: 'Testimonial Fields',
    fields: [
      {
        name: 'testimonial_quote',
        label: 'Testimonial Quote',
        type: 'textarea',
        instructions: 'The testimonial quote'
      },
      {
        name: 'testimonial_author',
        label: 'Author Name',
        type: 'text',
        instructions: 'Name of the person giving the testimonial (or anonymous)'
      },
      {
        name: 'testimonial_author_title',
        label: 'Author Title/Description',
        type: 'text',
        instructions: 'A brief description of the author (e.g., "Patient since 2022")'
      },
      {
        name: 'testimonial_image',
        label: 'Author Image',
        type: 'image',
        instructions: 'Optional image of the testimonial author'
      },
      {
        name: 'testimonial_rating',
        label: 'Rating',
        type: 'number',
        instructions: 'Rating out of 5',
        min: 1,
        max: 5
      },
      {
        name: 'testimonial_service',
        label: 'Related Service',
        type: 'relationship',
        instructions: 'The service this testimonial is about',
        post_type: ['service']
      },
      {
        name: 'testimonial_provider',
        label: 'Related Provider',
        type: 'relationship',
        instructions: 'The provider this testimonial is about',
        post_type: ['provider']
      }
    ],
    location: [
      [
        {
          param: 'post_type',
          operator: '==',
          value: 'testimonial'
        }
      ]
    ]
  },
  {
    name: 'insurance',
    title: 'Insurance Fields',
    fields: [
      {
        name: 'insurance_logo',
        label: 'Insurance Logo',
        type: 'image',
        instructions: 'Logo of the insurance company'
      },
      {
        name: 'insurance_details',
        label: 'Insurance Details',
        type: 'wysiwyg',
        instructions: 'Details about this insurance plan'
      },
      {
        name: 'insurance_verification_link',
        label: 'Verification Link',
        type: 'url',
        instructions: 'Link to verify coverage (optional)'
      }
    ],
    location: [
      [
        {
          param: 'post_type',
          operator: '==',
          value: 'insurance'
        }
      ]
    ]
  },
  {
    name: 'homepage',
    title: 'Homepage Settings',
    fields: [
      {
        name: 'homepage_hero',
        label: 'Hero Section',
        type: 'group',
        sub_fields: [
          {
            name: 'hero_headline',
            label: 'Hero Headline',
            type: 'text',
            default_value: 'The best of mental healthcare in one place'
          },
          {
            name: 'hero_subtext',
            label: 'Hero Subtext',
            type: 'textarea',
            default_value: 'Get care fast — in person or online, within days'
          },
          {
            name: 'hero_button_text',
            label: 'Button Text',
            type: 'text',
            default_value: 'Book Appointment'
          },
          {
            name: 'hero_button_link',
            label: 'Button Link',
            type: 'page_link'
          },
          {
            name: 'hero_image',
            label: 'Hero Image',
            type: 'image'
          }
        ]
      },
      {
        name: 'homepage_trust',
        label: 'Trust Strip',
        type: 'group',
        sub_fields: [
          {
            name: 'trust_headline',
            label: 'Trust Headline',
            type: 'text',
            default_value: 'Lifespan Psychiatry accepts insurance'
          },
          {
            name: 'trust_points',
            label: 'Trust Points',
            type: 'repeater',
            sub_fields: [
              {
                name: 'point_title',
                label: 'Point Title',
                type: 'text'
              },
              {
                name: 'point_description',
                label: 'Point Description',
                type: 'text'
              }
            ]
          }
        ]
      },
      {
        name: 'homepage_services',
        label: 'Services Section',
        type: 'group',
        sub_fields: [
          {
            name: 'services_title',
            label: 'Section Title',
            type: 'text',
            default_value: 'How We Help'
          },
          {
            name: 'services_description',
            label: 'Section Description',
            type: 'textarea'
          },
          {
            name: 'featured_services',
            label: 'Featured Services',
            type: 'relationship',
            post_type: ['service']
          }
        ]
      },
      {
        name: 'homepage_conditions',
        label: 'Conditions Section',
        type: 'group',
        sub_fields: [
          {
            name: 'conditions_title',
            label: 'Section Title',
            type: 'text',
            default_value: 'Conditions We Treat'
          },
          {
            name: 'conditions_description',
            label: 'Section Description',
            type: 'textarea'
          },
          {
            name: 'featured_conditions',
            label: 'Featured Conditions',
            type: 'relationship',
            post_type: ['condition']
          }
        ]
      }
    ],
    location: [
      [
        {
          param: 'page_template',
          operator: '==',
          value: 'page-home.php'
        }
      ]
    ]
  },
  {
    name: 'homepage_part2',
    title: 'Homepage Settings (Part 2)',
    fields: [
      {
        name: 'homepage_providers',
        label: 'Providers Section',
        type: 'group',
        sub_fields: [
          {
            name: 'providers_title',
            label: 'Section Title',
            type: 'text',
            default_value: 'Our Mental Health Specialists'
          },
          {
            name: 'providers_description',
            label: 'Section Description',
            type: 'textarea'
          }
        ]
      },
      {
        name: 'homepage_testimonials',
        label: 'Testimonials Section',
        type: 'group',
        sub_fields: [
          {
            name: 'testimonials_title',
            label: 'Section Title',
            type: 'text',
            default_value: 'What Our Patients Say'
          },
          {
            name: 'featured_testimonials',
            label: 'Featured Testimonials',
            type: 'relationship',
            post_type: ['testimonial']
          }
        ]
      },
      {
        name: 'homepage_cta',
        label: 'Final CTA Section',
        type: 'group',
        sub_fields: [
          {
            name: 'cta_title',
            label: 'CTA Title',
            type: 'text',
            default_value: 'Let\'s get you the care you deserve'
          },
          {
            name: 'cta_text',
            label: 'CTA Text',
            type: 'textarea'
          },
          {
            name: 'cta_button_text',
            label: 'Button Text',
            type: 'text',
            default_value: 'Book Appointment'
          },
          {
            name: 'cta_button_link',
            label: 'Button Link',
            type: 'page_link'
          }
        ]
      },
      {
        name: 'homepage_crisis',
        label: 'Crisis Notice',
        type: 'group',
        sub_fields: [
          {
            name: 'crisis_text',
            label: 'Crisis Text',
            type: 'textarea',
            default_value: 'If you\'re experiencing a mental health emergency: Call 988 or text HOME to 741741'
          }
        ]
      }
    ],
    location: [
      [
        {
          param: 'page_template',
          operator: '==',
          value: 'page-home.php'
        }
      ]
    ]
  },
  {
    name: 'site_options',
    title: 'Site Options',
    fields: [
      {
        name: 'company_info',
        label: 'Company Information',
        type: 'group',
        sub_fields: [
          {
            name: 'company_name',
            label: 'Company Name',
            type: 'text',
            default_value: 'Lifespan Psychiatry'
          },
          {
            name: 'company_tagline',
            label: 'Company Tagline',
            type: 'text'
          },
          {
            name: 'company_logo',
            label: 'Company Logo',
            type: 'image'
          },
          {
            name: 'company_address',
            label: 'Address',
            type: 'textarea'
          },
          {
            name: 'company_phone',
            label: 'Phone Number',
            type: 'text'
          },
          {
            name: 'company_email',
            label: 'Email Address',
            type: 'email'
          },
          {
            name: 'company_hours',
            label: 'Business Hours',
            type: 'textarea'
          }
        ]
      },
      {
        name: 'social_media',
        label: 'Social Media',
        type: 'group',
        sub_fields: [
          {
            name: 'facebook',
            label: 'Facebook URL',
            type: 'url'
          },
          {
            name: 'instagram',
            label: 'Instagram URL',
            type: 'url'
          },
          {
            name: 'twitter',
            label: 'Twitter URL',
            type: 'url'
          },
          {
            name: 'linkedin',
            label: 'LinkedIn URL',
            type: 'url'
          },
          {
            name: 'youtube',
            label: 'YouTube URL',
            type: 'url'
          }
        ]
      },
      {
        name: 'global_cta',
        label: 'Global Call to Action',
        type: 'group',
        sub_fields: [
          {
            name: 'cta_text',
            label: 'CTA Text',
            type: 'text',
            default_value: 'Ready to get started?'
          },
          {
            name: 'cta_button_text',
            label: 'Button Text',
            type: 'text',
            default_value: 'Book Appointment'
          },
          {
            name: 'cta_button_link',
            label: 'Button Link',
            type: 'page_link'
          }
        ]
      },
      {
        name: 'global_crisis_notice',
        label: 'Global Crisis Notice',
        type: 'textarea',
        default_value: 'If you\'re experiencing a mental health emergency: Call 988 or text HOME to 741741'
      },
      {
        name: 'seo_settings',
        label: 'SEO Settings',
        type: 'group',
        sub_fields: [
          {
            name: 'meta_title',
            label: 'Default Meta Title',
            type: 'text'
          },
          {
            name: 'meta_description',
            label: 'Default Meta Description',
            type: 'textarea'
          },
          {
            name: 'google_analytics',
            label: 'Google Analytics Code',
            type: 'text'
          }
        ]
      }
    ],
    location: [
      [
        {
          param: 'options_page',
          operator: '==',
          value: 'site-options'
        }
      ]
    ]
  }
];

module.exports = { fieldGroups };











