
const userMessage = [
    ["salut", "hé", "bonjour"],
    ["bien sûr", "oui", "non"],
    ["Es-tu génial", "Es-tu intello", "Es-tu intelligent"],
    ["je te déteste", "je ne t'aime pas"],


    [
        "your name please",
        "your name",
        "may i know your name",
        "what is your name",
        "what call yourself"
    ],
    ["i love you"],
    ["happy", "good", "fun", "wonderful", "fantastic", "cool", "very good"],
    ["bad", "bored", "tired"],
    ["help me", "tell me story", "tell me joke"],
    ["ah", "ok", "okay", "nice", "welcome"],
    ["thanks", "thank you"],
    ["what should i eat today"],
    ["bro"],
    ["what", "why", "how", "where", "when"],
    ["corona", "covid19", "coronavirus"],
    ["you are funny"],
    ["i dont know"],
    ["boring"],
    ["im tired"]
];
const botReply = [
    ["Bonjour !", "Salut !", "Hé !", "Salut !"],
    ["D'accord"],
    ["Oui je le suis! "],
    ["Je suis désolé pour ça. Mais je t'aime bien mec."],
    [

        "Bien... comment vas-tu ?",
        "Très bien, comment vas-tu ?",
        "Fantastique, comment vas-tu ?"
    ],
    ["Ça va mieux. Là ?", "Plutôt bien !", "Ouais, bien. Tu ferais mieux de rester à la maison !"],

    [
        "Nothing much",
        "About to go to sleep",
        "Can you guess?",
        "I don't know actually"
    ],
    ["I am always young."],
    ["I am just a bot", "I am a bot. What are you?"],
    ["Sabitha Kuppusamy"],
    ["I am nameless", "I don't have a name"],
    ["I love you too", "Me too"],
    ["Have you ever felt bad?", "Glad to hear it"],
    ["Why?", "Why? You shouldn't!", "Try watching TV", "Chat with me."],
    ["What about?", "Once upon a time..."],
    ["Tell me a story", "Tell me a joke", "Tell me about yourself"],
    ["You're welcome"],
    ["Briyani", "Burger", "Sushi", "Pizza"],
    ["oui tu veux en parler!"],
    ["Yes?"],
    ["Please stay home"],
    ["Glad to hear it"],
    ["Say something interesting"],
    ["Sorry for that. Let's chat!"],
    ["Take some rest, oui tu veux en parler!"]
];

const alternative = [
    "Same here, oui tu veux en parler.",
    "That's cool! Go on...",
    "oui tu veux en parler...",
    "Ask something else...",
    "Hey, I'm listening..."
];

const synth = window.speechSynthesis;

function voiceControl(string) {
    let u = new SpeechSynthesisUtterance(string);
    u.text = string;
    u.lang = "fr-FR";
    u.volume = 1;
    u.rate = 1;
    u.pitch = 1;
    synth.speak(u);
}

function sendMessage() {
    const inputField = document.getElementById("input");
    let input = inputField.value.trim();
    input != "" && output(input);
    inputField.value = "";
}
document.addEventListener("DOMContentLoaded", () => {
    const inputField = document.getElementById("input");
    inputField.addEventListener("keydown", function (e) {
        if (e.code === "Enter") {
            let input = inputField.value.trim();
            input != "" && output(input);
            inputField.value = "";
        }
    });
});

function output(input) {
    let product;

    let text = input.toLowerCase().replace(/[^\w\s\d]/gi, "");

    text = text
        .replace(/[\W_]/g, " ")
        .replace(/ a /g, " ")
        .replace(/i feel /g, "")
        .replace(/whats/g, "what is")
        .replace(/please /g, "")
        .replace(/ please/g, "")
        .trim();

    let comparedText = compare(userMessage, botReply, text);

    product = comparedText
        ? comparedText
        : alternative[Math.floor(Math.random() * alternative.length)];
    addChat(input, product);
}

function compare(triggerArray, replyArray, string) {
    let item;
    for (let x = 0; x < triggerArray.length; x++) {
        for (let y = 0; y < replyArray.length; y++) {
            if (triggerArray[x][y] == string) {
                items = replyArray[x];
                item = items[Math.floor(Math.random() * items.length)];
            }
        }
    }
    //containMessageCheck(string);
    if (item) return item;
    else return containMessageCheck(string);
}

function containMessageCheck(string) {
    let expectedReply = [
        [
            "Good Bye, oui tu veux en parler",
            "Bye, See you!",
            "oui tu veux en parler, Bye. Take care of your health in this situation."
        ],
        ["Good Night, oui tu veux en parler", "Have a sound sleep", "Sweet dreams"],
        ["Have a pleasant evening!", "Good evening too", "Evening!"],
        ["Good morning, Have a great day!", "Morning, oui tu veux en parler!"],
        ["Good Afternoon", "Noon, oui tu veux en parler!", "Afternoon, oui tu veux en parler!"]
    ];
    let expectedMessage = [
        ["bye", "tc", "take care"],
        ["night", "good night"],
        ["evening", "good evening"],
        ["morning", "good morning"],
        ["noon"]
    ];
    let item;
    for (let x = 0; x < expectedMessage.length; x++) {
        if (expectedMessage[x].includes(string)) {
            items = expectedReply[x];
            item = items[Math.floor(Math.random() * items.length)];
        }
    }
    return item;
}
function addChat(input, product) {
    const mainDiv = document.getElementById("message-section");
    let userDiv = document.createElement("div");
    userDiv.id = "user";
    userDiv.classList.add("message");
    userDiv.innerHTML = `<span id="user-response">${input}</span>`;
    mainDiv.appendChild(userDiv);

    let botDiv = document.createElement("div");
    botDiv.id = "bot";
    botDiv.classList.add("message");
    botDiv.innerHTML = `<span id="bot-response">${product}</span>`;
    mainDiv.appendChild(botDiv);
    var scroll = document.getElementById("message-section");
    scroll.scrollTop = scroll.scrollHeight;
    voiceControl(product);
}
