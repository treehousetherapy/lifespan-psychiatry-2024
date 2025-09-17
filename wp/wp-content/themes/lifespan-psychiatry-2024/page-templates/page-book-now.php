<?php
/*
Template Name: Book Now
*/

get_header();
?>

<main id="primary" class="site-main">
    <section class="hero" style="padding:3rem 0;background:linear-gradient(135deg,#eef2ff 0%, #e0f2fe 50%, #fef9c3 100%);">
        <div class="container">
            <h1 style="margin:0 0 0.5rem 0;font-size:2.5rem;line-height:1.2;color:#0f172a;">Book an appointment</h1>
            <p style="max-width:800px;color:#334155;">Same-week availability for psychiatry and therapy. Fill out the form and our team will contact you to confirm details.</p>
        </div>
    </section>

    <section style="padding:2rem 0;background:#ffffff;">
        <div class="container" style="max-width:960px;">
            <?php if (isset($_GET['booked']) && $_GET['booked'] === '1') : ?>
                <div style="background:#ecfdf5;color:#065f46;border:1px solid #a7f3d0;padding:1rem 1.25rem;border-radius:8px;margin-bottom:1.25rem;">
                    Thank you. Your request has been received. We’ll reach out shortly to schedule.
                </div>
            <?php endif; ?>

            <form class="book-now-form" method="post" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" style="display:grid;grid-template-columns:repeat(auto-fit,minmax(260px,1fr));gap:1rem;background:#ffffff;padding:1.75rem;border-radius:14px;box-shadow:0 20px 40px rgba(2,8,20,0.06);border:1px solid #e5e7eb;">
                <input type="hidden" name="action" value="lifespan_book_now" />
                <input type="hidden" name="_redirect" value="<?php echo esc_url( home_url('/book-now/') ); ?>" />
                <?php wp_nonce_field('lifespan_book_now'); ?>

                <div>
                    <label for="full_name" style="display:block;font-weight:600;margin-bottom:0.5rem;color:#0f172a;">Full name</label>
                    <input required type="text" id="full_name" name="full_name" placeholder="Jane Doe" style="width:100%;padding:0.9rem 1rem;border:1px solid #e5e7eb;border-radius:10px;background:#fbfdff;" />
                </div>

                <div>
                    <label for="email" style="display:block;font-weight:600;margin-bottom:0.5rem;color:#0f172a;">Email</label>
                    <input required type="email" id="email" name="email" placeholder="you@example.com" style="width:100%;padding:0.9rem 1rem;border:1px solid #e5e7eb;border-radius:10px;background:#fbfdff;" />
                </div>

                <div>
                    <label for="phone" style="display:block;font-weight:600;margin-bottom:0.5rem;color:#0f172a;">Phone</label>
                    <input required type="tel" id="phone" name="phone" placeholder="(555) 123-4567" style="width:100%;padding:0.9rem 1rem;border:1px solid #e5e7eb;border-radius:10px;background:#fbfdff;" />
                </div>

                <div>
                    <label for="service" style="display:block;font-weight:600;margin-bottom:0.5rem;color:#0f172a;">Service</label>
                    <select id="service" name="service" style="width:100%;padding:0.9rem 1rem;border:1px solid #e5e7eb;border-radius:10px;background:#fbfdff;">
                        <option>Psychiatry</option>
                        <option>Talk Therapy</option>
                        <option>Medication Management</option>
                    </select>
                </div>

                <div>
                    <label for="appointment_type" style="display:block;font-weight:600;margin-bottom:0.5rem;color:#0f172a;">Appointment type</label>
                    <select id="appointment_type" name="appointment_type" style="width:100%;padding:0.9rem 1rem;border:1px solid #e5e7eb;border-radius:10px;background:#fbfdff;">
                        <option>In-person</option>
                        <option>Telehealth</option>
                        <option>Either</option>
                    </select>
                </div>

                <div>
                    <label for="insurance" style="display:block;font-weight:600;margin-bottom:0.5rem;color:#0f172a;">Insurance</label>
                    <input type="text" id="insurance" name="insurance" placeholder="Plan name (or Self-pay)" style="width:100%;padding:0.9rem 1rem;border:1px solid #e5e7eb;border-radius:10px;background:#fbfdff;" />
                </div>

                <div style="grid-column:1/-1;">
                    <label for="message" style="display:block;font-weight:600;margin-bottom:0.5rem;color:#0f172a;">How can we help?</label>
                    <textarea id="message" name="message" rows="6" placeholder="Share a few details about what brings you in..." style="width:100%;padding:1rem;border:1px solid #e5e7eb;border-radius:12px;background:#fbfdff;"></textarea>
                </div>

                <div style="grid-column:1/-1;display:flex;gap:0.75rem;align-items:center;"> 
                    <button type="submit" class="btn btn-primary" style="background:linear-gradient(135deg,#5B8DEF 0%, #4F76E1 100%);color:#fff;border:none;border-radius:12px;padding:0.95rem 1.75rem;font-weight:700;box-shadow:0 10px 18px rgba(91,141,239,0.28);">Request appointment</button>
                    <span style="font-size:0.9rem;color:#6b7280;">By submitting you agree to our privacy policy.</span>
                </div>
            </form>
        </div>
    </section>
</main>

<?php get_footer(); ?>

<style>
/* Book Now polished input focus */
.book-now-form input[type="text"],
.book-now-form input[type="email"],
.book-now-form input[type="tel"],
.book-now-form select,
.book-now-form textarea { transition: box-shadow .2s, border-color .2s; }
.book-now-form input:focus,
.book-now-form select:focus,
.book-now-form textarea:focus { outline: none; border-color: #93c5fd; box-shadow: 0 0 0 4px rgba(147,197,253,0.35); background:#ffffff; }
.book-now-form ::placeholder { color:#94a3b8; }
</style>






