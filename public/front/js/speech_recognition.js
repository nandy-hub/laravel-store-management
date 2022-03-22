const inputElement = document.getElementById('field-name');
const submitElement = document.getElementById('button-submit');

class RecognitionManager {
    constructor() {
        this.isStarted = false;
        this.subscriber = null;

        const SpeechRecognition = window.speechRecognition || window.webkitSpeechRecognition;
        this.recognition = new SpeechRecognition();
        this.recognition.continuous = true;
        this.recognition.lang = 'ta';

        this.recognition.onstart = this.startHandler;
        this.recognition.onend = this.endHandler;
        this.recognition.onerror = this.endHandler;
        this.recognition.onresult = this.resultHandler;
    }

    subscribe(handler) {
        this.subscriber = handler;
    }

    start() {
        console.log('start');
        this.recognition.start();
    }

    stop() {
        console.log('end');
        this.recognition.stop();
    }

    startHandler = () => {
        this.isStarted = true;
    }
    endHandler = () => {
        this.isStarted = false;
        this.start();
    }
    resultHandler = (event) => {
        this.isStarted = false;

        console.log(event);
        const current = event.resultIndex;
        const transcript = event.results[current][0].transcript.trim();
        this.subscriber && this.subscriber(transcript);
    }
}

const customHandler = (text) => {
    if (text === 'submit') {
        submitElement.focus();
    } else {
        submitElement.blur();
        inputElement.value = text;
    }
    console.log(text);
}

const recognitionManager = new RecognitionManager();
recognitionManager.subscribe(customHandler);
recognitionManager.start();

function focusHandler(event) {
    console.log('Field focus');
    // if (!recognitionManager.isStarted) {
    //     recognitionManager.start();
    // }
}

function blurHandler(event) {
    console.log('Field blur');
    // recognitionManager.stop();
}

inputElement.addEventListener('focus', focusHandler);