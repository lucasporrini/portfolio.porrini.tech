window.addEventListener('load', () => {
    // On fait ce qu'il faut pour le chatbot
    let chatbot = document.getElementById('chatbot');
    let chatbotHeader = chatbot.querySelectorAll('div')[0]; 
    let chatbotContent = chatbot.querySelectorAll('div')[1];
    let button = chatbot.querySelector('button');

    let chatbotMessageContainer = document.getElementById('chat-message-container');
    let chatbotMessage = chatbotMessageContainer.querySelectorAll('div');
    let chatbotButtonMessageContainer = document.getElementById('chat-button-container');
    let chatbotButtonMessage = chatbotButtonMessageContainer.querySelectorAll('div');

    chatbotHeader.addEventListener('mouseover', (e) => {
        e.preventDefault();
        chatbotHeader.classList.remove('disabled');
    });

    chatbotHeader.addEventListener('mouseout', (e) => {
        e.preventDefault();
        chatbotHeader.classList.add('disabled');
    });

    chatbotHeader.addEventListener('click', (e) => {
        e.preventDefault();

        chatbotHeader.removeEventListener('mouseout', (e) => {
            e.preventDefault();
            chatbotHeader.classList.add('disabled');
        });
        
        // actualize the new message in variable
        chatbotMessage = chatbotMessageContainer.querySelectorAll('div');
        chatbotButtonMessage = chatbotButtonMessageContainer.querySelectorAll('div');

        if(!button.querySelector('svg').classList.contains('rotate-45')) {
            toggleChatbotContent(chatbotContent);
            toggleButtonRotation(button.querySelector('svg'));
            undisplayChatbotMessage(chatbotMessage);
            undisplayChatbotMessage(chatbotButtonMessage);
        } else {

            // toggle class
            toggleButtonRotation(button.querySelector('svg'));
            toggleChatbotContent(chatbotContent);
            displayChatbotMessage(chatbotMessage);

            // wait for the chatbot message to display
            setTimeout(() => {
                displayChatbotMessage(chatbotButtonMessage);
            }, (chatbotMessage.length + 1) * calculateTimeToWait(chatbotMessage));
            
            chatbotButtonMessage.forEach((element, index) => {
                element.addEventListener('click', (e) => {
                    e.preventDefault();

                    // get the message and the id
                    let message = element.textContent;
                    let id = element.getAttribute('data-umi');
                    
                    // remove the other buttons
                    undisplayChatbotButton(chatbotButtonMessage);

                    // display the message
                    appendMessage(chatbotMessageContainer, message, true);

                    // actualize the new message in variable
                    chatbotMessage = chatbotMessageContainer.querySelectorAll('div');

                    // wait and display the chatbot response
                    getTokenValue().then(fetchedToken => {
                        displayChatbotResponse(id, chatbotMessageContainer, fetchedToken);
                    });
                });
            });
        }
    });
});

let token = null;

async function getToken() {
    try {
        const response = await fetch('https://portfolio.porrini.tech/api/token', {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json'
            },
        });

        if (!response.ok) {
            throw new Error('Network response was not ok');
        }

        const data = await response.json();
        return data;

    } catch (error) {
        console.error('There has been a problem with your fetch operation:', error);
    }
}

async function getTokenValue() {
    const tokenData = await getToken();
    if (tokenData && tokenData.token) {
        token = tokenData.token;
    }
    return token;
}

function toggleButtonRotation(element) {
    element.classList.toggle('rotate-45');
}

function toggleChatbotContent(element) {
    element.classList.toggle('chatbot-content-open');
}

function calculateTimeToWait(array) {
    return array.length > 4 ? 200 : 500;
}

function displayChatbotMessage(array) {
    setTimeout(() => {
        array.forEach((element, index) => {
            setTimeout(() => {
                element.classList.remove('opacity-0');
                element.classList.remove('translate-y-2');
            }, index * calculateTimeToWait(array));
        });
    });
}

function undisplayChatbotButton(array) {
    // get the button on the page and undisplay it
    array.forEach(element => {
        element.classList.add('opacity-0');
        element.classList.add('translate-y-2');
    });
}

function displayChatbotButton(array) {
    // get the button on the page and display it
    array.forEach((element, index) => {
        setTimeout(() => {
            element.classList.remove('opacity-0');
            element.classList.remove('translate-y-2');
            array[index].scrollIntoView({behavior: 'smooth', block: 'end'});
        }, index * calculateTimeToWait(array));
    });
}

async function displayChatbotResponse(userEntryId, container, token) {
    // api request to get the chatbot response
    try{
        fetch('https://api.porrini.tech/get_chatbot_response_to_message/' + userEntryId, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + token
            },
        })
        .then(response => {
            if(!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            let counter = 0;
            data.forEach((element, index) => {
                setTimeout(() => {
                    appendMessage(container, element.chatbot_value, false);
                }, (index + 1) * 500);
                counter++;
                if (counter == data.length) {
                    setTimeout(() => {
                        displayChatbotButton(document.getElementById('chat-button-container').querySelectorAll('div'));
                    }, (data.length + 2) * 500);
                }
            });
        })
        .catch(error => {
            console.error('There has been a problem with your fetch operation:', error);
        });
    } catch(error) {
        console.log(error);
    }
}

function undisplayChatbotMessage(array) {
    array.forEach(element => {
        element.classList.add('opacity-0');
        element.classList.add('translate-y-2');
    });
}

function appendMessage(parentElement, message, isUser) {
    if(isUser == true) {
        // display the message
        let newMessage = document.createElement('div');
        newMessage.classList.add('chatbot-user_message', 'opacity-0', 'translate-y-2');
        newMessage.textContent = message;
        parentElement.appendChild(newMessage);

        // display the chatbot message
        setTimeout(() => {
            newMessage.classList.remove('opacity-0');
            newMessage.classList.remove('translate-y-2');
        }, 500);
    } else {
        // display the message
        let newMessage = document.createElement('div');
        newMessage.classList.add('chatbot-bot_message', 'opacity-0', 'translate-y-2');
        newMessage.textContent = message;
        parentElement.appendChild(newMessage);

        // display the chatbot message
        setTimeout(() => {
            newMessage.classList.remove('opacity-0');
            newMessage.classList.remove('translate-y-2');
            parentElement.scrollIntoView({behavior: 'smooth', block: 'end'});
        }, 500);
    }
}