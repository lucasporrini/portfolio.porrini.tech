<!-- Chat Section Begin -->
<div id="chatbot" class="chatbot">
        <div class="chatbot-header disabled">
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