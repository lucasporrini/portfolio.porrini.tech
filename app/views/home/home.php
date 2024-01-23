<?php
    $this->layout(
        '../template/page_template',
        [
            'title' => $this->e($title),
            'data' => $data
        ]
    );
?>

<!-- Content -->
<main id="content" class="root">
    <div class="parallax"></div>

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="hero-date">
            <div class="hero-date-first">
                <span class="hero-date-day"><?= $data['current_date']['day'] ?></span> 
            </div>
            <div class="hero-date-second">
                <span class="hero-date-month"><?= $data['current_date']['month'] ?></span>
                <span>Available to<br>work</span>
            </div>
        </div>
        <div class="hero-title">
            <div class="hero-title-text">
                <div class="hero-title-text-first">
                    <span>Designer</span>
                    <span>&</span>
                </div>
                <div class="hero-title-text-second">
                    <span>Developer</span>
                </div>
            </div>
        </div>
        <div class="hero-description">
            <p>I am a designer and developer</p>
            <p>based in France. I have many years of experience in consulting and development in all areas of digital. My favorite design are minimal and brutalism design. I love nature, carbonara and music.</p>
            <a href="mailto:porrini.lucas@gmail.com" class="hero-button button">
                <span>Contact me</span>
            </a>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- About Section Begin -->
    <section class="about">
        <div class="about-content">
            <div class="about-title">
                <span class="about-title-hello">Hello. I'm Lucas</span>
                <span class="about-title-name">Lucas Porrini</span>
            </div>
            <div class="about-description">
                <p>I USE MY PASSION AND SKILLS TO CREATE DIGITAL PRODUCTS AND EXPERIENCES. NATIONAL AND INTERNATIONAL CUSTOMERS RELY ON ME FOR DESIGN, IMPLEMENTATION, AND MANAGEMENT OF THEIR DIGITAL PRODUCTS. AS AN INDEPENDENT, I WORK ALSO WITH WEB AGENCIES, COMPANIES, STARTUPS AND INDIVIDUALS TO CREATE A BLUEPRINT FOR THE DIGITAL BUSINESS. ADVISOR AND PARTNER OF SOME DIGITAL AND FINTECH STARTUPS. ALSO, JUDGE AT CSSDA AND THE WEBBY.</p>
            </div>
        </div>
        <canvas id="modelContainer" class="about-model"></canvas>
    </section>
    <!-- About Section End -->

    <!-- Selected Works Section Begin -->
    <section class="works">
        <div class="works-title">
            <span>Selected Works</span>
        </div>
        <div class="works-selection" style="margin-inline: auto;">
            <div class="works-selection-title">
                <span>First Work</span>
                <span>Subtitle work</span>
            </div>
            <div class="works-selection-image">
                <img src="https://placehold.co/500x300" alt="">
            </div>
        </div>
        <div class="works-selection" style="margin-left: auto;">
            <div class="works-selection-title">
                <span>Second Work</span>
                <span>Subtitle work</span>
            </div>
            <div class="works-selection-image">
                <img src="https://placehold.co/500x300" alt="">
            </div>
        </div>
        <div class="works-selection" style="margin-left: 100px;">
            <div class="works-selection-title">
                <span>Third Work</span>
                <span>Subtitle work</span>
            </div>
            <div class="works-selection-image">
                <img src="https://placehold.co/500x300" alt="">
            </div>
        </div>
        <div class="works-selection" style="margin-right: auto;">
            <div class="works-selection-title">
                <span>Fourth Work</span>
                <span>Subtitle work</span>
            </div>
            <div class="works-selection-image">
                <img src="https://placehold.co/500x300" alt="">
            </div>
        </div>
        <div class="works-button-container">
            <span>Yes, these are some buttons</span>
            <a href="mailto:porrini.lucas@gmail.com" class="works-button button">
                <span class="">Contact me</span>
            </a>
            <a href="mailto:porrini.lucas@gmail.com" class="works-button-reverse">
                <span>See other cases</span>
            </a>
        </div>
    </section>
    <!-- Selected Works Section End -->

    <!-- CTA Section Begin -->
    <section id="cta" class="cta">
        <span class="cta-title">Let's<br>connect</span>
        <div class="cta-buttons">
            <div>
                <a href="mailto:porrini.lucas@gmail.com" class="button">Frontend developer</a>
                <a href="mailto:porrini.lucas@gmail.com" class="button">Backend developer</a>
                <a href="mailto:porrini.lucas@gmail.com" class="button">Fullstack developer</a>
            </div>
            <div>
                <a href="mailto:porrini.lucas@gmail.com" class="button">Digital consultant</a>
                <a href="mailto:porrini.lucas@gmail.com" class="button">Designer developer</a>
            </div>
            <div>
                <a href="mailto:porrini.lucas@gmail.com" class="button">Database developer</a>
                <a href="mailto:porrini.lucas@gmail.com" class="button">Database designer</a>
            </div>
        </div>
    </section>
    <!-- CTA Section End -->

    <!-- Chat Section Begin -->
    <div id="chatbot" class="chatbot">
        <div class="chatbot-header">
            <span class="font-medium">Lucas Bot</span>
            <span>Posez moi une question</span>
            <button class="chatbot-button">
                <svg class="rotate-45" stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" height="1.25em" width="1.25em" xmlns="http://www.w3.org/2000/svg"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </button>
        </div>
        <div class="chatbot-content">
            <div id="chat-message-container" class="chatbot-content-first_bot_message">
                <?php
                    foreach($data['chatbot'] as $item) {
                        if($item['chatbot_bloc'] == 1 && $item['chatbot_type'] == 'chatbot_response' && $item['active'] == 1) {
                            echo '<div class="chatbot-bot_message translate-y-2 opacity-0">' . $item['chatbot_value'] . '</div>';
                        }
                    }
                ?>
            </div>
            <div id="chat-button-container" class="chatbot-button-container">
                <?php
                    foreach($data['chatbot'] as $item) {
                        if($item['chatbot_bloc'] == 1 && $item['chatbot_type'] == 'chatbot_button' && $item['active'] == 1) {
                            echo '<div class="chatbot-button_message translate-y-2 opacity-0" data-umi=' . $item['chatbot_id'] . '>' . $item['chatbot_value'] . '</div>';
                        }
                    }
                ?>
            </div>
        </div>
    </div>
    <!-- Chat Section End -->
</main>
<!-- Content -->