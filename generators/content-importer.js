#!/usr/bin/env node
/**
 * Content Importer Script
 * 
 * Automatically generates demo content for Lifespan Psychiatry website
 * Creates services, conditions, providers, and testimonials
 */

const fs = require('fs');
const path = require('path');

// Configuration - Demo content
const demoContent = {
  services: [
    {
      title: 'Psychiatry',
      subtitle: 'Expert medication management',
      content: `<p>Our psychiatric services provide comprehensive evaluation and treatment for a range of mental health conditions. Our psychiatrists are medical doctors specialized in mental health who can prescribe medications and provide ongoing care.</p>
<h3>What to expect:</h3>
<p>During your initial evaluation, our psychiatrist will conduct a thorough assessment of your symptoms, medical history, and other relevant factors. Based on this evaluation, they will develop a personalized treatment plan that may include medication, therapy recommendations, or lifestyle changes.</p>
<p>Follow-up appointments will monitor your progress, adjust medications as needed, and address any concerns or side effects.</p>`,
      benefits: [
        {
          title: 'Medication Management',
          description: 'Expert prescribing and monitoring of psychiatric medications'
        },
        {
          title: 'Comprehensive Evaluations',
          description: 'In-depth assessments to understand your unique needs'
        },
        {
          title: 'Collaborative Care',
          description: 'Coordination with therapists and other healthcare providers'
        }
      ],
      process: [
        {
          title: 'Initial Evaluation',
          description: 'A thorough assessment of your symptoms and medical history'
        },
        {
          title: 'Treatment Planning',
          description: 'Development of a personalized medication and care plan'
        },
        {
          title: 'Follow-up Care',
          description: 'Regular appointments to monitor progress and adjust treatment'
        }
      ]
    },
    {
      title: 'Talk Therapy',
      subtitle: 'Evidence-based therapeutic approaches',
      content: `<p>Our licensed therapists provide evidence-based talk therapy to help you address challenges, develop coping skills, and improve your mental well-being. We offer a variety of therapeutic approaches tailored to your specific needs.</p>
<h3>Our approaches include:</h3>
<ul>
<li>Cognitive Behavioral Therapy (CBT)</li>
<li>Dialectical Behavior Therapy (DBT)</li>
<li>Psychodynamic Therapy</li>
<li>Solution-Focused Brief Therapy</li>
<li>Mindfulness-Based Cognitive Therapy</li>
</ul>
<p>Through regular sessions, you'll work collaboratively with your therapist to address your concerns, develop new skills, and work toward your personal goals.</p>`,
      benefits: [
        {
          title: 'Evidence-Based Methods',
          description: 'Therapeutic techniques proven effective through research'
        },
        {
          title: 'Personalized Approach',
          description: 'Therapy tailored to your unique needs and goals'
        },
        {
          title: 'Skill Development',
          description: 'Learn practical tools to manage symptoms and improve wellbeing'
        }
      ],
      process: [
        {
          title: 'Initial Assessment',
          description: 'Understanding your concerns, history, and therapy goals'
        },
        {
          title: 'Treatment Planning',
          description: 'Developing a personalized therapy approach'
        },
        {
          title: 'Regular Sessions',
          description: 'Ongoing therapeutic work with regular progress evaluations'
        }
      ]
    },
    {
      title: 'Medication Management',
      subtitle: 'Ongoing care for psychiatric medications',
      content: `<p>Our medication management services provide ongoing care and monitoring for patients taking psychiatric medications. This service ensures that your medications are working effectively while minimizing side effects.</p>
<h3>Our medication management includes:</h3>
<ul>
<li>Regular evaluation of medication effectiveness</li>
<li>Monitoring and managing side effects</li>
<li>Adjusting dosages as needed</li>
<li>Educating about medications and their effects</li>
<li>Coordination with other healthcare providers</li>
</ul>
<p>Our psychiatrists take a thoughtful approach to medication, prescribing conservatively and closely monitoring your response to ensure the best outcomes with minimal side effects.</p>`,
      benefits: [
        {
          title: 'Expert Monitoring',
          description: 'Regular assessment of medication effectiveness and side effects'
        },
        {
          title: 'Medication Education',
          description: 'Clear information about your medications and what to expect'
        },
        {
          title: 'Coordinated Care',
          description: 'Communication with your therapy providers and primary care'
        }
      ],
      process: [
        {
          title: 'Medication Review',
          description: 'Evaluation of current medications and their effectiveness'
        },
        {
          title: 'Adjustment & Optimization',
          description: 'Fine-tuning medications to maximize benefits and minimize side effects'
        },
        {
          title: 'Ongoing Monitoring',
          description: 'Regular follow-ups to ensure continued effectiveness'
        }
      ]
    }
  ],
  conditions: [
    {
      title: 'Depression',
      subtitle: 'Expert treatment for depression and mood disorders',
      content: `<p>Depression is more than just feeling sad or going through a rough patch. It's a serious mental health condition that requires understanding and medical care. With proper diagnosis and treatment, the vast majority of people with depression can overcome it and regain joy in their lives.</p>
<h3>Common symptoms of depression include:</h3>
<ul>
<li>Persistent sad, anxious, or "empty" mood</li>
<li>Loss of interest or pleasure in activities</li>
<li>Feelings of hopelessness or pessimism</li>
<li>Decreased energy, fatigue, feeling "slowed down"</li>
<li>Difficulty concentrating, remembering, or making decisions</li>
<li>Insomnia, early-morning awakening, or oversleeping</li>
<li>Changes in appetite and/or weight</li>
<li>Thoughts of death or suicide, or suicide attempts</li>
</ul>
<p>At Lifespan Psychiatry, we offer comprehensive treatment for depression, including medication management, therapy, and lifestyle recommendations.</p>`,
      symptoms: [
        {
          symptom: 'Persistent sad mood',
          symptom_description: 'Feeling sad or having a "down" mood that doesn\'t go away'
        },
        {
          symptom: 'Loss of interest',
          symptom_description: 'No longer finding enjoyment in activities you used to enjoy'
        },
        {
          symptom: 'Sleep disturbances',
          symptom_description: 'Difficulty falling asleep, staying asleep, or sleeping too much'
        },
        {
          symptom: 'Fatigue',
          symptom_description: 'Feeling tired and having low energy nearly every day'
        },
        {
          symptom: 'Concentration problems',
          symptom_description: 'Trouble focusing, making decisions, or remembering things'
        }
      ],
      resources: [
        {
          resource_title: 'National Institute of Mental Health - Depression',
          resource_description: 'Comprehensive information about depression from the NIMH',
          resource_link: 'https://www.nimh.nih.gov/health/topics/depression'
        },
        {
          resource_title: 'Depression and Bipolar Support Alliance',
          resource_description: 'Support resources for people living with mood disorders',
          resource_link: 'https://www.dbsalliance.org/'
        }
      ]
    },
    {
      title: 'Anxiety',
      subtitle: 'Relief from anxiety and panic disorders',
      content: `<p>Anxiety disorders are the most common mental health concern in the United States, affecting approximately 40 million adults. While everyone experiences anxiety at times, anxiety disorders involve more than temporary worry or fear. For a person with an anxiety disorder, the anxiety does not go away and can get worse over time.</p>
<h3>Common anxiety disorders include:</h3>
<ul>
<li>Generalized Anxiety Disorder (GAD)</li>
<li>Panic Disorder</li>
<li>Social Anxiety Disorder</li>
<li>Specific Phobias</li>
<li>Separation Anxiety</li>
</ul>
<p>At Lifespan Psychiatry, we provide effective treatment for anxiety disorders through a combination of therapy approaches, medication when appropriate, and practical coping strategies.</p>`,
      symptoms: [
        {
          symptom: 'Excessive worry',
          symptom_description: 'Persistent and overwhelming worry about everyday situations'
        },
        {
          symptom: 'Restlessness',
          symptom_description: 'Feeling on edge or having difficulty relaxing'
        },
        {
          symptom: 'Physical symptoms',
          symptom_description: 'Increased heart rate, rapid breathing, sweating, trembling'
        },
        {
          symptom: 'Avoidance',
          symptom_description: 'Avoiding situations or places that trigger anxiety'
        },
        {
          symptom: 'Sleep problems',
          symptom_description: 'Difficulty falling or staying asleep due to racing thoughts'
        }
      ],
      resources: [
        {
          resource_title: 'Anxiety and Depression Association of America',
          resource_description: 'Information and resources for anxiety disorders',
          resource_link: 'https://adaa.org/'
        },
        {
          resource_title: 'National Institute of Mental Health - Anxiety Disorders',
          resource_description: 'Research-based information about anxiety disorders',
          resource_link: 'https://www.nimh.nih.gov/health/topics/anxiety-disorders'
        }
      ]
    },
    {
      title: 'ADHD',
      subtitle: 'Effective management of attention-deficit/hyperactivity disorder',
      content: `<p>Attention-deficit/hyperactivity disorder (ADHD) is a neurodevelopmental disorder that affects both children and adults. It is characterized by an ongoing pattern of inattention, hyperactivity, and/or impulsivity that interferes with functioning or development.</p>
<h3>ADHD typically presents in three ways:</h3>
<ul>
<li>Predominantly Inattentive Presentation: Difficulty paying attention, staying organized, and following instructions</li>
<li>Predominantly Hyperactive-Impulsive Presentation: Excessive fidgeting, talking, and interrupting; difficulty sitting still or waiting</li>
<li>Combined Presentation: Symptoms of both inattention and hyperactivity-impulsivity</li>
</ul>
<p>At Lifespan Psychiatry, we provide comprehensive ADHD evaluations and treatment plans that may include medication management, behavioral strategies, and practical accommodations for school or work.</p>`,
      symptoms: [
        {
          symptom: 'Inattention',
          symptom_description: 'Difficulty focusing, following instructions, or completing tasks'
        },
        {
          symptom: 'Hyperactivity',
          symptom_description: 'Excessive movement, fidgeting, or talking'
        },
        {
          symptom: 'Impulsivity',
          symptom_description: 'Acting without thinking about consequences'
        },
        {
          symptom: 'Disorganization',
          symptom_description: 'Struggles with time management and keeping track of tasks'
        },
        {
          symptom: 'Forgetfulness',
          symptom_description: 'Frequently losing items or forgetting daily activities'
        }
      ],
      resources: [
        {
          resource_title: 'CHADD - Children and Adults with ADHD',
          resource_description: 'Education, advocacy and support for individuals with ADHD',
          resource_link: 'https://chadd.org/'
        },
        {
          resource_title: 'ADDitude Magazine',
          resource_description: 'Strategies and support for ADHD and learning disabilities',
          resource_link: 'https://www.additudemag.com/'
        }
      ]
    }
  ],
  providers: [
    {
      title: 'Dr. Sarah Johnson',
      credentials: 'MD',
      job_title: 'Psychiatrist',
      specialties: ['Adult Psychiatry', 'Depression', 'Anxiety'],
      biography: `<p>Dr. Sarah Johnson is a board-certified psychiatrist with over 10 years of experience treating adults with various mental health conditions. She completed her medical degree at the University of Minnesota Medical School, followed by a psychiatry residency at Mayo Clinic.</p>
<p>Dr. Johnson specializes in the treatment of mood and anxiety disorders, with a particular interest in depression, bipolar disorder, and generalized anxiety. She takes a holistic approach to mental health, considering biological, psychological, and social factors in her treatment plans.</p>
<p>Her approach to care emphasizes collaboration with patients to develop personalized treatment strategies that may include medication management, therapy recommendations, and lifestyle modifications.</p>`,
      education: [
        {
          degree: 'Doctor of Medicine',
          institution: 'University of Minnesota Medical School',
          year: 2008
        },
        {
          degree: 'Residency in Psychiatry',
          institution: 'Mayo Clinic',
          year: 2012
        },
        {
          degree: 'Bachelor of Science in Biology',
          institution: 'University of Wisconsin',
          year: 2004
        }
      ],
      languages: [
        {
          language: 'English',
          proficiency: 'native'
        },
        {
          language: 'Spanish',
          proficiency: 'conversational'
        }
      ]
    },
    {
      title: 'Michael Wilson',
      credentials: 'LMFT',
      job_title: 'Licensed Marriage and Family Therapist',
      specialties: ['Cognitive Behavioral Therapy', 'Trauma', 'Relationship Issues'],
      biography: `<p>Michael Wilson is a Licensed Marriage and Family Therapist with extensive experience helping individuals and couples navigate life's challenges. He earned his Master's degree in Marriage and Family Therapy from St. Cloud State University.</p>
<p>Michael specializes in cognitive behavioral therapy (CBT) and has additional training in trauma-focused therapies, including EMDR. He works with adults dealing with anxiety, depression, relationship issues, life transitions, and trauma.</p>
<p>His therapeutic approach is warm, collaborative, and solution-focused. Michael believes in creating a safe, nonjudgmental space where clients can explore their concerns and develop practical skills to improve their wellbeing.</p>`,
      education: [
        {
          degree: 'Master of Science in Marriage and Family Therapy',
          institution: 'St. Cloud State University',
          year: 2014
        },
        {
          degree: 'EMDR Certification',
          institution: 'EMDR International Association',
          year: 2017
        },
        {
          degree: 'Bachelor of Arts in Psychology',
          institution: 'University of Minnesota',
          year: 2011
        }
      ],
      languages: [
        {
          language: 'English',
          proficiency: 'native'
        }
      ]
    }
  ],
  testimonials: [
    {
      quote: "Dr. Johnson has been incredibly helpful in managing my depression and anxiety. For the first time in years, I feel like I have the tools to cope with my symptoms and live a more fulfilling life.",
      author: "J.M.",
      author_title: "Patient since 2021",
      rating: 5
    },
    {
      quote: "Michael is an exceptional therapist. His approach is compassionate yet practical. The cognitive behavioral techniques he's taught me have made a huge difference in how I handle stress and relationship conflicts.",
      author: "T.R.",
      author_title: "Patient since 2020",
      rating: 5
    },
    {
      quote: "After struggling with untreated ADHD for years, finding Lifespan Psychiatry has been life-changing. The combination of medication management and therapy strategies has helped me focus better at work and feel more in control of my life.",
      author: "A.K.",
      author_title: "Patient since 2022",
      rating: 5
    }
  ],
  insurance: [
    {
      title: "Blue Cross Blue Shield",
      details: "<p>We accept most Blue Cross Blue Shield plans. Please contact your insurance provider to verify that your specific plan covers our services.</p>"
    },
    {
      title: "HealthPartners",
      details: "<p>We accept HealthPartners insurance plans. Please verify your coverage and any copay or coinsurance requirements.</p>"
    },
    {
      title: "Medicare",
      details: "<p>We accept Medicare for eligible services. Please bring your Medicare card to your first appointment.</p>"
    },
    {
      title: "UCare",
      details: "<p>We accept many UCare plans. Please contact your insurance provider to verify coverage.</p>"
    }
  ]
};

/**
 * Generate SQL insert statements for WordPress content
 * This script generates SQL that can be used to import content directly into a WordPress database
 */
function generateWordPressSql() {
  let sqlContent = `-- WordPress Demo Content Import SQL
-- Generated automatically by content-importer.js
-- For Lifespan Psychiatry MN Website

-- NOTE: This SQL should be run on a fresh WordPress installation
-- after the custom post types have been registered.

`;

  // Helper function to create post SQL
  function createPostSql(postType, title, content, excerpt = '', postDate = new Date()) {
    const formattedDate = postDate.toISOString().slice(0, 19).replace('T', ' ');
    const postName = title.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)/g, '');
    
    return `
-- Insert ${postType}: ${title}
INSERT INTO wp_posts (post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status, post_name, post_modified, post_modified_gmt, post_parent, guid, menu_order, post_type, comment_count)
VALUES (1, '${formattedDate}', '${formattedDate}', '${content.replace(/'/g, "''")}', '${title.replace(/'/g, "''")}', '${excerpt.replace(/'/g, "''")}', 'publish', 'closed', 'closed', '${postName}', '${formattedDate}', '${formattedDate}', 0, '', 0, '${postType}', 0);
SET @last_${postType}_id = LAST_INSERT_ID();
`;
  }

  // Helper function to create meta SQL
  function createMetaSql(postType, metaKey, metaValue) {
    return `
INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_${postType}_id, '${metaKey}', '${metaValue.replace(/'/g, "''")}');
`;
  }

  // Generate SQL for services
  sqlContent += `
-- SERVICES
-- ========
`;

  demoContent.services.forEach(service => {
    sqlContent += createPostSql('service', service.title, service.content, service.subtitle);
    sqlContent += createMetaSql('service', 'service_subtitle', service.subtitle);
    
    if (service.benefits && service.benefits.length) {
      // Create serialized ACF repeater field for benefits
      let benefitsCounter = 0;
      sqlContent += createMetaSql('service', 'service_benefits', `a:${service.benefits.length}:{`);
      
      service.benefits.forEach((benefit, index) => {
        sqlContent += createMetaSql('service', `service_benefits_${index}_benefit_title`, benefit.title);
        sqlContent += createMetaSql('service', `service_benefits_${index}_benefit_description`, benefit.description);
      });
    }
    
    if (service.process && service.process.length) {
      // Create serialized ACF repeater field for process
      let processCounter = 0;
      sqlContent += createMetaSql('service', 'service_process', `a:${service.process.length}:{`);
      
      service.process.forEach((step, index) => {
        sqlContent += createMetaSql('service', `service_process_${index}_process_title`, step.title);
        sqlContent += createMetaSql('service', `service_process_${index}_process_description`, step.description);
      });
    }
  });

  // Generate SQL for conditions
  sqlContent += `
-- CONDITIONS
-- ==========
`;

  demoContent.conditions.forEach(condition => {
    sqlContent += createPostSql('condition', condition.title, condition.content, condition.subtitle);
    sqlContent += createMetaSql('condition', 'condition_subtitle', condition.subtitle);
    
    if (condition.symptoms && condition.symptoms.length) {
      // Create serialized ACF repeater field for symptoms
      sqlContent += createMetaSql('condition', 'condition_symptoms', `a:${condition.symptoms.length}:{`);
      
      condition.symptoms.forEach((symptom, index) => {
        sqlContent += createMetaSql('condition', `condition_symptoms_${index}_symptom`, symptom.symptom);
        sqlContent += createMetaSql('condition', `condition_symptoms_${index}_symptom_description`, symptom.symptom_description);
      });
    }
    
    if (condition.resources && condition.resources.length) {
      // Create serialized ACF repeater field for resources
      sqlContent += createMetaSql('condition', 'condition_resources', `a:${condition.resources.length}:{`);
      
      condition.resources.forEach((resource, index) => {
        sqlContent += createMetaSql('condition', `condition_resources_${index}_resource_title`, resource.resource_title);
        sqlContent += createMetaSql('condition', `condition_resources_${index}_resource_description`, resource.resource_description);
        sqlContent += createMetaSql('condition', `condition_resources_${index}_resource_link`, resource.resource_link);
      });
    }
  });

  // Generate SQL for providers
  sqlContent += `
-- PROVIDERS
-- =========
`;

  demoContent.providers.forEach(provider => {
    sqlContent += createPostSql('provider', provider.title, provider.biography);
    sqlContent += createMetaSql('provider', 'provider_credentials', provider.credentials);
    sqlContent += createMetaSql('provider', 'provider_title', provider.job_title);
    
    if (provider.education && provider.education.length) {
      // Create serialized ACF repeater field for education
      sqlContent += createMetaSql('provider', 'provider_education', `a:${provider.education.length}:{`);
      
      provider.education.forEach((edu, index) => {
        sqlContent += createMetaSql('provider', `provider_education_${index}_degree`, edu.degree);
        sqlContent += createMetaSql('provider', `provider_education_${index}_institution`, edu.institution);
        sqlContent += createMetaSql('provider', `provider_education_${index}_year`, edu.year.toString());
      });
    }
    
    if (provider.languages && provider.languages.length) {
      // Create serialized ACF repeater field for languages
      sqlContent += createMetaSql('provider', 'provider_languages', `a:${provider.languages.length}:{`);
      
      provider.languages.forEach((lang, index) => {
        sqlContent += createMetaSql('provider', `provider_languages_${index}_language`, lang.language);
        sqlContent += createMetaSql('provider', `provider_languages_${index}_proficiency`, lang.proficiency);
      });
    }
    
    // Add provider specialties
    if (provider.specialties && provider.specialties.length) {
      provider.specialties.forEach(specialty => {
        sqlContent += `
-- Add specialty "${specialty}" for provider
INSERT IGNORE INTO wp_terms (name, slug) VALUES ('${specialty.replace(/'/g, "''")}', '${specialty.toLowerCase().replace(/[^a-z0-9]+/g, '-')}');
SET @specialty_term_id = LAST_INSERT_ID();
INSERT IGNORE INTO wp_term_taxonomy (term_id, taxonomy, description) VALUES (@specialty_term_id, 'provider_specialty', '');
SET @specialty_term_taxonomy_id = LAST_INSERT_ID();
INSERT IGNORE INTO wp_term_relationships (object_id, term_taxonomy_id) VALUES (@last_provider_id, @specialty_term_taxonomy_id);
`;
      });
    }
  });

  // Generate SQL for testimonials
  sqlContent += `
-- TESTIMONIALS
-- ============
`;

  demoContent.testimonials.forEach(testimonial => {
    sqlContent += createPostSql('testimonial', testimonial.author, testimonial.quote);
    sqlContent += createMetaSql('testimonial', 'testimonial_quote', testimonial.quote);
    sqlContent += createMetaSql('testimonial', 'testimonial_author', testimonial.author);
    sqlContent += createMetaSql('testimonial', 'testimonial_author_title', testimonial.author_title);
    sqlContent += createMetaSql('testimonial', 'testimonial_rating', testimonial.rating.toString());
  });

  // Generate SQL for insurance
  sqlContent += `
-- INSURANCE
-- =========
`;

  demoContent.insurance.forEach(insurance => {
    sqlContent += createPostSql('insurance', insurance.title, insurance.details);
    sqlContent += createMetaSql('insurance', 'insurance_details', insurance.details);
  });

  return sqlContent;
}

/**
 * Generate demo content in WXR format (WordPress XML Export format)
 * This can be imported via the WordPress importer
 */
function generateWordPressXml() {
  const date = new Date().toISOString();
  const year = new Date().getFullYear();
  
  let xmlContent = `<?xml version="1.0" encoding="UTF-8" ?>
<!-- This is a WordPress eXtended RSS file generated by the content-importer.js script -->
<!-- It contains demo content for the Lifespan Psychiatry MN website -->
<!-- You can import this file via the WordPress importer tool -->

<rss version="2.0"
  xmlns:excerpt="http://wordpress.org/export/1.2/excerpt/"
  xmlns:content="http://purl.org/rss/1.0/modules/content/"
  xmlns:wfw="http://wellformedweb.org/CommentAPI/"
  xmlns:dc="http://purl.org/dc/elements/1.1/"
  xmlns:wp="http://wordpress.org/export/1.2/">

<channel>
  <title>Lifespan Psychiatry</title>
  <link>https://lifespanpsychiatrymn.com</link>
  <description>Demo content for Lifespan Psychiatry MN website</description>
  <pubDate>${date}</pubDate>
  <language>en-US</language>
  <wp:wxr_version>1.2</wp:wxr_version>
  <wp:base_site_url>https://lifespanpsychiatrymn.com</wp:base_site_url>
  <wp:base_blog_url>https://lifespanpsychiatrymn.com</wp:base_blog_url>
  
  <wp:author>
    <wp:author_id>1</wp:author_id>
    <wp:author_login>admin</wp:author_login>
    <wp:author_email>admin@lifespanpsychiatrymn.com</wp:author_email>
    <wp:author_display_name><![CDATA[Admin]]></wp:author_display_name>
    <wp:author_first_name><![CDATA[Site]]></wp:author_first_name>
    <wp:author_last_name><![CDATA[Admin]]></wp:author_last_name>
  </wp:author>
  
`;

  // Helper function to create item XML
  function createItemXml(postType, title, content, excerpt = '', postName = null, postDate = new Date()) {
    if (!postName) {
      postName = title.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)/g, '');
    }
    
    const formattedDate = postDate.toISOString().replace('T', ' ').replace(/\.\d+Z$/, '');
    
    return `
  <item>
    <title><![CDATA[${title}]]></title>
    <link>https://lifespanpsychiatrymn.com/${postType}/${postName}/</link>
    <pubDate>${formattedDate}</pubDate>
    <dc:creator><![CDATA[Admin]]></dc:creator>
    <guid isPermaLink="false">https://lifespanpsychiatrymn.com/?post_type=${postType}&amp;p=${Math.floor(Math.random() * 1000) + 1}</guid>
    <description></description>
    <content:encoded><![CDATA[${content}]]></content:encoded>
    <excerpt:encoded><![CDATA[${excerpt}]]></excerpt:encoded>
    <wp:post_date>${formattedDate}</wp:post_date>
    <wp:post_date_gmt>${formattedDate}</wp:post_date_gmt>
    <wp:comment_status>closed</wp:comment_status>
    <wp:ping_status>closed</wp:ping_status>
    <wp:post_name>${postName}</wp:post_name>
    <wp:status>publish</wp:status>
    <wp:post_parent>0</wp:post_parent>
    <wp:menu_order>0</wp:menu_order>
    <wp:post_type>${postType}</wp:post_type>
    <wp:post_password></wp:post_password>
    <wp:is_sticky>0</wp:is_sticky>
`;
  }

  // Helper function to add postmeta XML
  function addPostMetaXml(metaKey, metaValue) {
    return `    <wp:postmeta>
      <wp:meta_key>${metaKey}</wp:meta_key>
      <wp:meta_value><![CDATA[${metaValue}]]></wp:meta_value>
    </wp:postmeta>
`;
  }

  // Add services
  demoContent.services.forEach(service => {
    xmlContent += createItemXml('service', service.title, service.content, service.subtitle);
    xmlContent += addPostMetaXml('service_subtitle', service.subtitle);
    
    // Add benefits as serialized data
    if (service.benefits && service.benefits.length) {
      xmlContent += addPostMetaXml('service_benefits', '');
      service.benefits.forEach((benefit, index) => {
        xmlContent += addPostMetaXml(`service_benefits_${index}_benefit_title`, benefit.title);
        xmlContent += addPostMetaXml(`service_benefits_${index}_benefit_description`, benefit.description);
      });
    }
    
    // Add process steps as serialized data
    if (service.process && service.process.length) {
      xmlContent += addPostMetaXml('service_process', '');
      service.process.forEach((step, index) => {
        xmlContent += addPostMetaXml(`service_process_${index}_process_title`, step.title);
        xmlContent += addPostMetaXml(`service_process_${index}_process_description`, step.description);
      });
    }
    
    xmlContent += '  </item>\n';
  });

  // Add conditions
  demoContent.conditions.forEach(condition => {
    xmlContent += createItemXml('condition', condition.title, condition.content, condition.subtitle);
    xmlContent += addPostMetaXml('condition_subtitle', condition.subtitle);
    
    // Add symptoms as serialized data
    if (condition.symptoms && condition.symptoms.length) {
      xmlContent += addPostMetaXml('condition_symptoms', '');
      condition.symptoms.forEach((symptom, index) => {
        xmlContent += addPostMetaXml(`condition_symptoms_${index}_symptom`, symptom.symptom);
        xmlContent += addPostMetaXml(`condition_symptoms_${index}_symptom_description`, symptom.symptom_description);
      });
    }
    
    // Add resources as serialized data
    if (condition.resources && condition.resources.length) {
      xmlContent += addPostMetaXml('condition_resources', '');
      condition.resources.forEach((resource, index) => {
        xmlContent += addPostMetaXml(`condition_resources_${index}_resource_title`, resource.resource_title);
        xmlContent += addPostMetaXml(`condition_resources_${index}_resource_description`, resource.resource_description);
        xmlContent += addPostMetaXml(`condition_resources_${index}_resource_link`, resource.resource_link);
      });
    }
    
    xmlContent += '  </item>\n';
  });

  // Add providers
  demoContent.providers.forEach(provider => {
    xmlContent += createItemXml('provider', provider.title, provider.biography);
    xmlContent += addPostMetaXml('provider_credentials', provider.credentials);
    xmlContent += addPostMetaXml('provider_title', provider.job_title);
    
    // Add education history as serialized data
    if (provider.education && provider.education.length) {
      xmlContent += addPostMetaXml('provider_education', '');
      provider.education.forEach((edu, index) => {
        xmlContent += addPostMetaXml(`provider_education_${index}_degree`, edu.degree);
        xmlContent += addPostMetaXml(`provider_education_${index}_institution`, edu.institution);
        xmlContent += addPostMetaXml(`provider_education_${index}_year`, edu.year.toString());
      });
    }
    
    // Add languages as serialized data
    if (provider.languages && provider.languages.length) {
      xmlContent += addPostMetaXml('provider_languages', '');
      provider.languages.forEach((lang, index) => {
        xmlContent += addPostMetaXml(`provider_languages_${index}_language`, lang.language);
        xmlContent += addPostMetaXml(`provider_languages_${index}_proficiency`, lang.proficiency);
      });
    }
    
    // Add provider specialties as terms
    if (provider.specialties && provider.specialties.length) {
      provider.specialties.forEach(specialty => {
        xmlContent += `    <wp:term>
      <wp:term_taxonomy>provider_specialty</wp:term_taxonomy>
      <wp:term_name><![CDATA[${specialty}]]></wp:term_name>
      <wp:term_slug>${specialty.toLowerCase().replace(/[^a-z0-9]+/g, '-')}</wp:term_slug>
    </wp:term>
`;
      });
    }
    
    xmlContent += '  </item>\n';
  });

  // Add testimonials
  demoContent.testimonials.forEach(testimonial => {
    xmlContent += createItemXml('testimonial', testimonial.author, testimonial.quote);
    xmlContent += addPostMetaXml('testimonial_quote', testimonial.quote);
    xmlContent += addPostMetaXml('testimonial_author', testimonial.author);
    xmlContent += addPostMetaXml('testimonial_author_title', testimonial.author_title);
    xmlContent += addPostMetaXml('testimonial_rating', testimonial.rating.toString());
    xmlContent += '  </item>\n';
  });

  // Add insurance
  demoContent.insurance.forEach(insurance => {
    xmlContent += createItemXml('insurance', insurance.title, insurance.details);
    xmlContent += addPostMetaXml('insurance_details', insurance.details);
    xmlContent += '  </item>\n';
  });

  // Close the XML document
  xmlContent += `</channel>
</rss>`;

  return xmlContent;
}

// Generate JSON data format (for programmatic import)
function generateJsonData() {
  return JSON.stringify(demoContent, null, 2);
}

// Output directory
const outputDir = path.join(__dirname, '../data');
if (!fs.existsSync(outputDir)) {
  fs.mkdirSync(outputDir, { recursive: true });
}

// Generate and write the SQL file
const sqlContent = generateWordPressSql();
fs.writeFileSync(path.join(outputDir, 'demo-content.sql'), sqlContent);

// Generate and write the XML file
const xmlContent = generateWordPressXml();
fs.writeFileSync(path.join(outputDir, 'demo-content.xml'), xmlContent);

// Generate and write the JSON file
const jsonContent = generateJsonData();
fs.writeFileSync(path.join(outputDir, 'demo-content.json'), jsonContent);

console.log(`✅ Generated demo content files in ${outputDir}:`);
console.log('  - demo-content.sql - SQL format for direct database import');
console.log('  - demo-content.xml - WXR format for WordPress Importer');
console.log('  - demo-content.json - JSON format for programmatic import');
console.log('\n✨ Content generation complete!');

