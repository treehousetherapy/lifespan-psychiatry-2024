-- WordPress Demo Content Import SQL
-- Generated automatically by content-importer.js
-- For Lifespan Psychiatry MN Website

-- NOTE: This SQL should be run on a fresh WordPress installation
-- after the custom post types have been registered.


-- SERVICES
-- ========

-- Insert service: Psychiatry
INSERT INTO wp_posts (post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status, post_name, post_modified, post_modified_gmt, post_parent, guid, menu_order, post_type, comment_count)
VALUES (1, '2025-09-04 22:48:33', '2025-09-04 22:48:33', '<p>Our psychiatric services provide comprehensive evaluation and treatment for a range of mental health conditions. Our psychiatrists are medical doctors specialized in mental health who can prescribe medications and provide ongoing care.</p>
<h3>What to expect:</h3>
<p>During your initial evaluation, our psychiatrist will conduct a thorough assessment of your symptoms, medical history, and other relevant factors. Based on this evaluation, they will develop a personalized treatment plan that may include medication, therapy recommendations, or lifestyle changes.</p>
<p>Follow-up appointments will monitor your progress, adjust medications as needed, and address any concerns or side effects.</p>', 'Psychiatry', 'Expert medication management', 'publish', 'closed', 'closed', 'psychiatry', '2025-09-04 22:48:33', '2025-09-04 22:48:33', 0, '', 0, 'service', 0);
SET @last_service_id = LAST_INSERT_ID();

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_service_id, 'service_subtitle', 'Expert medication management');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_service_id, 'service_benefits', 'a:3:{');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_service_id, 'service_benefits_0_benefit_title', 'Medication Management');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_service_id, 'service_benefits_0_benefit_description', 'Expert prescribing and monitoring of psychiatric medications');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_service_id, 'service_benefits_1_benefit_title', 'Comprehensive Evaluations');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_service_id, 'service_benefits_1_benefit_description', 'In-depth assessments to understand your unique needs');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_service_id, 'service_benefits_2_benefit_title', 'Collaborative Care');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_service_id, 'service_benefits_2_benefit_description', 'Coordination with therapists and other healthcare providers');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_service_id, 'service_process', 'a:3:{');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_service_id, 'service_process_0_process_title', 'Initial Evaluation');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_service_id, 'service_process_0_process_description', 'A thorough assessment of your symptoms and medical history');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_service_id, 'service_process_1_process_title', 'Treatment Planning');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_service_id, 'service_process_1_process_description', 'Development of a personalized medication and care plan');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_service_id, 'service_process_2_process_title', 'Follow-up Care');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_service_id, 'service_process_2_process_description', 'Regular appointments to monitor progress and adjust treatment');

-- Insert service: Talk Therapy
INSERT INTO wp_posts (post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status, post_name, post_modified, post_modified_gmt, post_parent, guid, menu_order, post_type, comment_count)
VALUES (1, '2025-09-04 22:48:33', '2025-09-04 22:48:33', '<p>Our licensed therapists provide evidence-based talk therapy to help you address challenges, develop coping skills, and improve your mental well-being. We offer a variety of therapeutic approaches tailored to your specific needs.</p>
<h3>Our approaches include:</h3>
<ul>
<li>Cognitive Behavioral Therapy (CBT)</li>
<li>Dialectical Behavior Therapy (DBT)</li>
<li>Psychodynamic Therapy</li>
<li>Solution-Focused Brief Therapy</li>
<li>Mindfulness-Based Cognitive Therapy</li>
</ul>
<p>Through regular sessions, you''ll work collaboratively with your therapist to address your concerns, develop new skills, and work toward your personal goals.</p>', 'Talk Therapy', 'Evidence-based therapeutic approaches', 'publish', 'closed', 'closed', 'talk-therapy', '2025-09-04 22:48:33', '2025-09-04 22:48:33', 0, '', 0, 'service', 0);
SET @last_service_id = LAST_INSERT_ID();

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_service_id, 'service_subtitle', 'Evidence-based therapeutic approaches');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_service_id, 'service_benefits', 'a:3:{');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_service_id, 'service_benefits_0_benefit_title', 'Evidence-Based Methods');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_service_id, 'service_benefits_0_benefit_description', 'Therapeutic techniques proven effective through research');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_service_id, 'service_benefits_1_benefit_title', 'Personalized Approach');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_service_id, 'service_benefits_1_benefit_description', 'Therapy tailored to your unique needs and goals');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_service_id, 'service_benefits_2_benefit_title', 'Skill Development');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_service_id, 'service_benefits_2_benefit_description', 'Learn practical tools to manage symptoms and improve wellbeing');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_service_id, 'service_process', 'a:3:{');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_service_id, 'service_process_0_process_title', 'Initial Assessment');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_service_id, 'service_process_0_process_description', 'Understanding your concerns, history, and therapy goals');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_service_id, 'service_process_1_process_title', 'Treatment Planning');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_service_id, 'service_process_1_process_description', 'Developing a personalized therapy approach');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_service_id, 'service_process_2_process_title', 'Regular Sessions');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_service_id, 'service_process_2_process_description', 'Ongoing therapeutic work with regular progress evaluations');

-- Insert service: Medication Management
INSERT INTO wp_posts (post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status, post_name, post_modified, post_modified_gmt, post_parent, guid, menu_order, post_type, comment_count)
VALUES (1, '2025-09-04 22:48:33', '2025-09-04 22:48:33', '<p>Our medication management services provide ongoing care and monitoring for patients taking psychiatric medications. This service ensures that your medications are working effectively while minimizing side effects.</p>
<h3>Our medication management includes:</h3>
<ul>
<li>Regular evaluation of medication effectiveness</li>
<li>Monitoring and managing side effects</li>
<li>Adjusting dosages as needed</li>
<li>Educating about medications and their effects</li>
<li>Coordination with other healthcare providers</li>
</ul>
<p>Our psychiatrists take a thoughtful approach to medication, prescribing conservatively and closely monitoring your response to ensure the best outcomes with minimal side effects.</p>', 'Medication Management', 'Ongoing care for psychiatric medications', 'publish', 'closed', 'closed', 'medication-management', '2025-09-04 22:48:33', '2025-09-04 22:48:33', 0, '', 0, 'service', 0);
SET @last_service_id = LAST_INSERT_ID();

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_service_id, 'service_subtitle', 'Ongoing care for psychiatric medications');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_service_id, 'service_benefits', 'a:3:{');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_service_id, 'service_benefits_0_benefit_title', 'Expert Monitoring');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_service_id, 'service_benefits_0_benefit_description', 'Regular assessment of medication effectiveness and side effects');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_service_id, 'service_benefits_1_benefit_title', 'Medication Education');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_service_id, 'service_benefits_1_benefit_description', 'Clear information about your medications and what to expect');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_service_id, 'service_benefits_2_benefit_title', 'Coordinated Care');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_service_id, 'service_benefits_2_benefit_description', 'Communication with your therapy providers and primary care');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_service_id, 'service_process', 'a:3:{');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_service_id, 'service_process_0_process_title', 'Medication Review');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_service_id, 'service_process_0_process_description', 'Evaluation of current medications and their effectiveness');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_service_id, 'service_process_1_process_title', 'Adjustment & Optimization');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_service_id, 'service_process_1_process_description', 'Fine-tuning medications to maximize benefits and minimize side effects');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_service_id, 'service_process_2_process_title', 'Ongoing Monitoring');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_service_id, 'service_process_2_process_description', 'Regular follow-ups to ensure continued effectiveness');

-- CONDITIONS
-- ==========

-- Insert condition: Depression
INSERT INTO wp_posts (post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status, post_name, post_modified, post_modified_gmt, post_parent, guid, menu_order, post_type, comment_count)
VALUES (1, '2025-09-04 22:48:33', '2025-09-04 22:48:33', '<p>Depression is more than just feeling sad or going through a rough patch. It''s a serious mental health condition that requires understanding and medical care. With proper diagnosis and treatment, the vast majority of people with depression can overcome it and regain joy in their lives.</p>
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
<p>At Lifespan Psychiatry, we offer comprehensive treatment for depression, including medication management, therapy, and lifestyle recommendations.</p>', 'Depression', 'Expert treatment for depression and mood disorders', 'publish', 'closed', 'closed', 'depression', '2025-09-04 22:48:33', '2025-09-04 22:48:33', 0, '', 0, 'condition', 0);
SET @last_condition_id = LAST_INSERT_ID();

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_condition_id, 'condition_subtitle', 'Expert treatment for depression and mood disorders');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_condition_id, 'condition_symptoms', 'a:5:{');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_condition_id, 'condition_symptoms_0_symptom', 'Persistent sad mood');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_condition_id, 'condition_symptoms_0_symptom_description', 'Feeling sad or having a "down" mood that doesn''t go away');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_condition_id, 'condition_symptoms_1_symptom', 'Loss of interest');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_condition_id, 'condition_symptoms_1_symptom_description', 'No longer finding enjoyment in activities you used to enjoy');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_condition_id, 'condition_symptoms_2_symptom', 'Sleep disturbances');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_condition_id, 'condition_symptoms_2_symptom_description', 'Difficulty falling asleep, staying asleep, or sleeping too much');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_condition_id, 'condition_symptoms_3_symptom', 'Fatigue');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_condition_id, 'condition_symptoms_3_symptom_description', 'Feeling tired and having low energy nearly every day');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_condition_id, 'condition_symptoms_4_symptom', 'Concentration problems');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_condition_id, 'condition_symptoms_4_symptom_description', 'Trouble focusing, making decisions, or remembering things');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_condition_id, 'condition_resources', 'a:2:{');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_condition_id, 'condition_resources_0_resource_title', 'National Institute of Mental Health - Depression');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_condition_id, 'condition_resources_0_resource_description', 'Comprehensive information about depression from the NIMH');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_condition_id, 'condition_resources_0_resource_link', 'https://www.nimh.nih.gov/health/topics/depression');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_condition_id, 'condition_resources_1_resource_title', 'Depression and Bipolar Support Alliance');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_condition_id, 'condition_resources_1_resource_description', 'Support resources for people living with mood disorders');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_condition_id, 'condition_resources_1_resource_link', 'https://www.dbsalliance.org/');

-- Insert condition: Anxiety
INSERT INTO wp_posts (post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status, post_name, post_modified, post_modified_gmt, post_parent, guid, menu_order, post_type, comment_count)
VALUES (1, '2025-09-04 22:48:33', '2025-09-04 22:48:33', '<p>Anxiety disorders are the most common mental health concern in the United States, affecting approximately 40 million adults. While everyone experiences anxiety at times, anxiety disorders involve more than temporary worry or fear. For a person with an anxiety disorder, the anxiety does not go away and can get worse over time.</p>
<h3>Common anxiety disorders include:</h3>
<ul>
<li>Generalized Anxiety Disorder (GAD)</li>
<li>Panic Disorder</li>
<li>Social Anxiety Disorder</li>
<li>Specific Phobias</li>
<li>Separation Anxiety</li>
</ul>
<p>At Lifespan Psychiatry, we provide effective treatment for anxiety disorders through a combination of therapy approaches, medication when appropriate, and practical coping strategies.</p>', 'Anxiety', 'Relief from anxiety and panic disorders', 'publish', 'closed', 'closed', 'anxiety', '2025-09-04 22:48:33', '2025-09-04 22:48:33', 0, '', 0, 'condition', 0);
SET @last_condition_id = LAST_INSERT_ID();

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_condition_id, 'condition_subtitle', 'Relief from anxiety and panic disorders');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_condition_id, 'condition_symptoms', 'a:5:{');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_condition_id, 'condition_symptoms_0_symptom', 'Excessive worry');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_condition_id, 'condition_symptoms_0_symptom_description', 'Persistent and overwhelming worry about everyday situations');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_condition_id, 'condition_symptoms_1_symptom', 'Restlessness');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_condition_id, 'condition_symptoms_1_symptom_description', 'Feeling on edge or having difficulty relaxing');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_condition_id, 'condition_symptoms_2_symptom', 'Physical symptoms');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_condition_id, 'condition_symptoms_2_symptom_description', 'Increased heart rate, rapid breathing, sweating, trembling');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_condition_id, 'condition_symptoms_3_symptom', 'Avoidance');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_condition_id, 'condition_symptoms_3_symptom_description', 'Avoiding situations or places that trigger anxiety');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_condition_id, 'condition_symptoms_4_symptom', 'Sleep problems');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_condition_id, 'condition_symptoms_4_symptom_description', 'Difficulty falling or staying asleep due to racing thoughts');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_condition_id, 'condition_resources', 'a:2:{');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_condition_id, 'condition_resources_0_resource_title', 'Anxiety and Depression Association of America');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_condition_id, 'condition_resources_0_resource_description', 'Information and resources for anxiety disorders');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_condition_id, 'condition_resources_0_resource_link', 'https://adaa.org/');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_condition_id, 'condition_resources_1_resource_title', 'National Institute of Mental Health - Anxiety Disorders');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_condition_id, 'condition_resources_1_resource_description', 'Research-based information about anxiety disorders');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_condition_id, 'condition_resources_1_resource_link', 'https://www.nimh.nih.gov/health/topics/anxiety-disorders');

-- Insert condition: ADHD
INSERT INTO wp_posts (post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status, post_name, post_modified, post_modified_gmt, post_parent, guid, menu_order, post_type, comment_count)
VALUES (1, '2025-09-04 22:48:33', '2025-09-04 22:48:33', '<p>Attention-deficit/hyperactivity disorder (ADHD) is a neurodevelopmental disorder that affects both children and adults. It is characterized by an ongoing pattern of inattention, hyperactivity, and/or impulsivity that interferes with functioning or development.</p>
<h3>ADHD typically presents in three ways:</h3>
<ul>
<li>Predominantly Inattentive Presentation: Difficulty paying attention, staying organized, and following instructions</li>
<li>Predominantly Hyperactive-Impulsive Presentation: Excessive fidgeting, talking, and interrupting; difficulty sitting still or waiting</li>
<li>Combined Presentation: Symptoms of both inattention and hyperactivity-impulsivity</li>
</ul>
<p>At Lifespan Psychiatry, we provide comprehensive ADHD evaluations and treatment plans that may include medication management, behavioral strategies, and practical accommodations for school or work.</p>', 'ADHD', 'Effective management of attention-deficit/hyperactivity disorder', 'publish', 'closed', 'closed', 'adhd', '2025-09-04 22:48:33', '2025-09-04 22:48:33', 0, '', 0, 'condition', 0);
SET @last_condition_id = LAST_INSERT_ID();

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_condition_id, 'condition_subtitle', 'Effective management of attention-deficit/hyperactivity disorder');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_condition_id, 'condition_symptoms', 'a:5:{');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_condition_id, 'condition_symptoms_0_symptom', 'Inattention');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_condition_id, 'condition_symptoms_0_symptom_description', 'Difficulty focusing, following instructions, or completing tasks');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_condition_id, 'condition_symptoms_1_symptom', 'Hyperactivity');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_condition_id, 'condition_symptoms_1_symptom_description', 'Excessive movement, fidgeting, or talking');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_condition_id, 'condition_symptoms_2_symptom', 'Impulsivity');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_condition_id, 'condition_symptoms_2_symptom_description', 'Acting without thinking about consequences');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_condition_id, 'condition_symptoms_3_symptom', 'Disorganization');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_condition_id, 'condition_symptoms_3_symptom_description', 'Struggles with time management and keeping track of tasks');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_condition_id, 'condition_symptoms_4_symptom', 'Forgetfulness');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_condition_id, 'condition_symptoms_4_symptom_description', 'Frequently losing items or forgetting daily activities');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_condition_id, 'condition_resources', 'a:2:{');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_condition_id, 'condition_resources_0_resource_title', 'CHADD - Children and Adults with ADHD');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_condition_id, 'condition_resources_0_resource_description', 'Education, advocacy and support for individuals with ADHD');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_condition_id, 'condition_resources_0_resource_link', 'https://chadd.org/');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_condition_id, 'condition_resources_1_resource_title', 'ADDitude Magazine');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_condition_id, 'condition_resources_1_resource_description', 'Strategies and support for ADHD and learning disabilities');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_condition_id, 'condition_resources_1_resource_link', 'https://www.additudemag.com/');

-- PROVIDERS
-- =========

-- Insert provider: Dr. Sarah Johnson
INSERT INTO wp_posts (post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status, post_name, post_modified, post_modified_gmt, post_parent, guid, menu_order, post_type, comment_count)
VALUES (1, '2025-09-04 22:48:33', '2025-09-04 22:48:33', '<p>Dr. Sarah Johnson is a board-certified psychiatrist with over 10 years of experience treating adults with various mental health conditions. She completed her medical degree at the University of Minnesota Medical School, followed by a psychiatry residency at Mayo Clinic.</p>
<p>Dr. Johnson specializes in the treatment of mood and anxiety disorders, with a particular interest in depression, bipolar disorder, and generalized anxiety. She takes a holistic approach to mental health, considering biological, psychological, and social factors in her treatment plans.</p>
<p>Her approach to care emphasizes collaboration with patients to develop personalized treatment strategies that may include medication management, therapy recommendations, and lifestyle modifications.</p>', 'Dr. Sarah Johnson', '', 'publish', 'closed', 'closed', 'dr-sarah-johnson', '2025-09-04 22:48:33', '2025-09-04 22:48:33', 0, '', 0, 'provider', 0);
SET @last_provider_id = LAST_INSERT_ID();

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_provider_id, 'provider_credentials', 'MD');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_provider_id, 'provider_title', 'Psychiatrist');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_provider_id, 'provider_education', 'a:3:{');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_provider_id, 'provider_education_0_degree', 'Doctor of Medicine');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_provider_id, 'provider_education_0_institution', 'University of Minnesota Medical School');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_provider_id, 'provider_education_0_year', '2008');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_provider_id, 'provider_education_1_degree', 'Residency in Psychiatry');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_provider_id, 'provider_education_1_institution', 'Mayo Clinic');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_provider_id, 'provider_education_1_year', '2012');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_provider_id, 'provider_education_2_degree', 'Bachelor of Science in Biology');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_provider_id, 'provider_education_2_institution', 'University of Wisconsin');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_provider_id, 'provider_education_2_year', '2004');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_provider_id, 'provider_languages', 'a:2:{');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_provider_id, 'provider_languages_0_language', 'English');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_provider_id, 'provider_languages_0_proficiency', 'native');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_provider_id, 'provider_languages_1_language', 'Spanish');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_provider_id, 'provider_languages_1_proficiency', 'conversational');

-- Add specialty "Adult Psychiatry" for provider
INSERT IGNORE INTO wp_terms (name, slug) VALUES ('Adult Psychiatry', 'adult-psychiatry');
SET @specialty_term_id = LAST_INSERT_ID();
INSERT IGNORE INTO wp_term_taxonomy (term_id, taxonomy, description) VALUES (@specialty_term_id, 'provider_specialty', '');
SET @specialty_term_taxonomy_id = LAST_INSERT_ID();
INSERT IGNORE INTO wp_term_relationships (object_id, term_taxonomy_id) VALUES (@last_provider_id, @specialty_term_taxonomy_id);

-- Add specialty "Depression" for provider
INSERT IGNORE INTO wp_terms (name, slug) VALUES ('Depression', 'depression');
SET @specialty_term_id = LAST_INSERT_ID();
INSERT IGNORE INTO wp_term_taxonomy (term_id, taxonomy, description) VALUES (@specialty_term_id, 'provider_specialty', '');
SET @specialty_term_taxonomy_id = LAST_INSERT_ID();
INSERT IGNORE INTO wp_term_relationships (object_id, term_taxonomy_id) VALUES (@last_provider_id, @specialty_term_taxonomy_id);

-- Add specialty "Anxiety" for provider
INSERT IGNORE INTO wp_terms (name, slug) VALUES ('Anxiety', 'anxiety');
SET @specialty_term_id = LAST_INSERT_ID();
INSERT IGNORE INTO wp_term_taxonomy (term_id, taxonomy, description) VALUES (@specialty_term_id, 'provider_specialty', '');
SET @specialty_term_taxonomy_id = LAST_INSERT_ID();
INSERT IGNORE INTO wp_term_relationships (object_id, term_taxonomy_id) VALUES (@last_provider_id, @specialty_term_taxonomy_id);

-- Insert provider: Michael Wilson
INSERT INTO wp_posts (post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status, post_name, post_modified, post_modified_gmt, post_parent, guid, menu_order, post_type, comment_count)
VALUES (1, '2025-09-04 22:48:33', '2025-09-04 22:48:33', '<p>Michael Wilson is a Licensed Marriage and Family Therapist with extensive experience helping individuals and couples navigate life''s challenges. He earned his Master''s degree in Marriage and Family Therapy from St. Cloud State University.</p>
<p>Michael specializes in cognitive behavioral therapy (CBT) and has additional training in trauma-focused therapies, including EMDR. He works with adults dealing with anxiety, depression, relationship issues, life transitions, and trauma.</p>
<p>His therapeutic approach is warm, collaborative, and solution-focused. Michael believes in creating a safe, nonjudgmental space where clients can explore their concerns and develop practical skills to improve their wellbeing.</p>', 'Michael Wilson', '', 'publish', 'closed', 'closed', 'michael-wilson', '2025-09-04 22:48:33', '2025-09-04 22:48:33', 0, '', 0, 'provider', 0);
SET @last_provider_id = LAST_INSERT_ID();

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_provider_id, 'provider_credentials', 'LMFT');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_provider_id, 'provider_title', 'Licensed Marriage and Family Therapist');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_provider_id, 'provider_education', 'a:3:{');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_provider_id, 'provider_education_0_degree', 'Master of Science in Marriage and Family Therapy');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_provider_id, 'provider_education_0_institution', 'St. Cloud State University');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_provider_id, 'provider_education_0_year', '2014');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_provider_id, 'provider_education_1_degree', 'EMDR Certification');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_provider_id, 'provider_education_1_institution', 'EMDR International Association');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_provider_id, 'provider_education_1_year', '2017');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_provider_id, 'provider_education_2_degree', 'Bachelor of Arts in Psychology');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_provider_id, 'provider_education_2_institution', 'University of Minnesota');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_provider_id, 'provider_education_2_year', '2011');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_provider_id, 'provider_languages', 'a:1:{');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_provider_id, 'provider_languages_0_language', 'English');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_provider_id, 'provider_languages_0_proficiency', 'native');

-- Add specialty "Cognitive Behavioral Therapy" for provider
INSERT IGNORE INTO wp_terms (name, slug) VALUES ('Cognitive Behavioral Therapy', 'cognitive-behavioral-therapy');
SET @specialty_term_id = LAST_INSERT_ID();
INSERT IGNORE INTO wp_term_taxonomy (term_id, taxonomy, description) VALUES (@specialty_term_id, 'provider_specialty', '');
SET @specialty_term_taxonomy_id = LAST_INSERT_ID();
INSERT IGNORE INTO wp_term_relationships (object_id, term_taxonomy_id) VALUES (@last_provider_id, @specialty_term_taxonomy_id);

-- Add specialty "Trauma" for provider
INSERT IGNORE INTO wp_terms (name, slug) VALUES ('Trauma', 'trauma');
SET @specialty_term_id = LAST_INSERT_ID();
INSERT IGNORE INTO wp_term_taxonomy (term_id, taxonomy, description) VALUES (@specialty_term_id, 'provider_specialty', '');
SET @specialty_term_taxonomy_id = LAST_INSERT_ID();
INSERT IGNORE INTO wp_term_relationships (object_id, term_taxonomy_id) VALUES (@last_provider_id, @specialty_term_taxonomy_id);

-- Add specialty "Relationship Issues" for provider
INSERT IGNORE INTO wp_terms (name, slug) VALUES ('Relationship Issues', 'relationship-issues');
SET @specialty_term_id = LAST_INSERT_ID();
INSERT IGNORE INTO wp_term_taxonomy (term_id, taxonomy, description) VALUES (@specialty_term_id, 'provider_specialty', '');
SET @specialty_term_taxonomy_id = LAST_INSERT_ID();
INSERT IGNORE INTO wp_term_relationships (object_id, term_taxonomy_id) VALUES (@last_provider_id, @specialty_term_taxonomy_id);

-- TESTIMONIALS
-- ============

-- Insert testimonial: J.M.
INSERT INTO wp_posts (post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status, post_name, post_modified, post_modified_gmt, post_parent, guid, menu_order, post_type, comment_count)
VALUES (1, '2025-09-04 22:48:33', '2025-09-04 22:48:33', 'Dr. Johnson has been incredibly helpful in managing my depression and anxiety. For the first time in years, I feel like I have the tools to cope with my symptoms and live a more fulfilling life.', 'J.M.', '', 'publish', 'closed', 'closed', 'j-m', '2025-09-04 22:48:33', '2025-09-04 22:48:33', 0, '', 0, 'testimonial', 0);
SET @last_testimonial_id = LAST_INSERT_ID();

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_testimonial_id, 'testimonial_quote', 'Dr. Johnson has been incredibly helpful in managing my depression and anxiety. For the first time in years, I feel like I have the tools to cope with my symptoms and live a more fulfilling life.');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_testimonial_id, 'testimonial_author', 'J.M.');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_testimonial_id, 'testimonial_author_title', 'Patient since 2021');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_testimonial_id, 'testimonial_rating', '5');

-- Insert testimonial: T.R.
INSERT INTO wp_posts (post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status, post_name, post_modified, post_modified_gmt, post_parent, guid, menu_order, post_type, comment_count)
VALUES (1, '2025-09-04 22:48:33', '2025-09-04 22:48:33', 'Michael is an exceptional therapist. His approach is compassionate yet practical. The cognitive behavioral techniques he''s taught me have made a huge difference in how I handle stress and relationship conflicts.', 'T.R.', '', 'publish', 'closed', 'closed', 't-r', '2025-09-04 22:48:33', '2025-09-04 22:48:33', 0, '', 0, 'testimonial', 0);
SET @last_testimonial_id = LAST_INSERT_ID();

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_testimonial_id, 'testimonial_quote', 'Michael is an exceptional therapist. His approach is compassionate yet practical. The cognitive behavioral techniques he''s taught me have made a huge difference in how I handle stress and relationship conflicts.');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_testimonial_id, 'testimonial_author', 'T.R.');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_testimonial_id, 'testimonial_author_title', 'Patient since 2020');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_testimonial_id, 'testimonial_rating', '5');

-- Insert testimonial: A.K.
INSERT INTO wp_posts (post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status, post_name, post_modified, post_modified_gmt, post_parent, guid, menu_order, post_type, comment_count)
VALUES (1, '2025-09-04 22:48:33', '2025-09-04 22:48:33', 'After struggling with untreated ADHD for years, finding Lifespan Psychiatry has been life-changing. The combination of medication management and therapy strategies has helped me focus better at work and feel more in control of my life.', 'A.K.', '', 'publish', 'closed', 'closed', 'a-k', '2025-09-04 22:48:33', '2025-09-04 22:48:33', 0, '', 0, 'testimonial', 0);
SET @last_testimonial_id = LAST_INSERT_ID();

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_testimonial_id, 'testimonial_quote', 'After struggling with untreated ADHD for years, finding Lifespan Psychiatry has been life-changing. The combination of medication management and therapy strategies has helped me focus better at work and feel more in control of my life.');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_testimonial_id, 'testimonial_author', 'A.K.');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_testimonial_id, 'testimonial_author_title', 'Patient since 2022');

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_testimonial_id, 'testimonial_rating', '5');

-- INSURANCE
-- =========

-- Insert insurance: Blue Cross Blue Shield
INSERT INTO wp_posts (post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status, post_name, post_modified, post_modified_gmt, post_parent, guid, menu_order, post_type, comment_count)
VALUES (1, '2025-09-04 22:48:33', '2025-09-04 22:48:33', '<p>We accept most Blue Cross Blue Shield plans. Please contact your insurance provider to verify that your specific plan covers our services.</p>', 'Blue Cross Blue Shield', '', 'publish', 'closed', 'closed', 'blue-cross-blue-shield', '2025-09-04 22:48:33', '2025-09-04 22:48:33', 0, '', 0, 'insurance', 0);
SET @last_insurance_id = LAST_INSERT_ID();

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_insurance_id, 'insurance_details', '<p>We accept most Blue Cross Blue Shield plans. Please contact your insurance provider to verify that your specific plan covers our services.</p>');

-- Insert insurance: HealthPartners
INSERT INTO wp_posts (post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status, post_name, post_modified, post_modified_gmt, post_parent, guid, menu_order, post_type, comment_count)
VALUES (1, '2025-09-04 22:48:33', '2025-09-04 22:48:33', '<p>We accept HealthPartners insurance plans. Please verify your coverage and any copay or coinsurance requirements.</p>', 'HealthPartners', '', 'publish', 'closed', 'closed', 'healthpartners', '2025-09-04 22:48:33', '2025-09-04 22:48:33', 0, '', 0, 'insurance', 0);
SET @last_insurance_id = LAST_INSERT_ID();

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_insurance_id, 'insurance_details', '<p>We accept HealthPartners insurance plans. Please verify your coverage and any copay or coinsurance requirements.</p>');

-- Insert insurance: Medicare
INSERT INTO wp_posts (post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status, post_name, post_modified, post_modified_gmt, post_parent, guid, menu_order, post_type, comment_count)
VALUES (1, '2025-09-04 22:48:33', '2025-09-04 22:48:33', '<p>We accept Medicare for eligible services. Please bring your Medicare card to your first appointment.</p>', 'Medicare', '', 'publish', 'closed', 'closed', 'medicare', '2025-09-04 22:48:33', '2025-09-04 22:48:33', 0, '', 0, 'insurance', 0);
SET @last_insurance_id = LAST_INSERT_ID();

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_insurance_id, 'insurance_details', '<p>We accept Medicare for eligible services. Please bring your Medicare card to your first appointment.</p>');

-- Insert insurance: UCare
INSERT INTO wp_posts (post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status, post_name, post_modified, post_modified_gmt, post_parent, guid, menu_order, post_type, comment_count)
VALUES (1, '2025-09-04 22:48:33', '2025-09-04 22:48:33', '<p>We accept many UCare plans. Please contact your insurance provider to verify coverage.</p>', 'UCare', '', 'publish', 'closed', 'closed', 'ucare', '2025-09-04 22:48:33', '2025-09-04 22:48:33', 0, '', 0, 'insurance', 0);
SET @last_insurance_id = LAST_INSERT_ID();

INSERT INTO wp_postmeta (post_id, meta_key, meta_value)
VALUES (@last_insurance_id, 'insurance_details', '<p>We accept many UCare plans. Please contact your insurance provider to verify coverage.</p>');
