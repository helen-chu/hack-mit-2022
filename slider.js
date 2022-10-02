var slider = document.getElementById("bar");
var output = document.getElementById("value");
output.innerHTML = slider.value; // Display the default slider value

// Update the current slider value (each time you drag the slider handle)
slider.oninput = function() {
    output.innerHTML = this.value;
}

// Firebase related code
// Import the functions you need from the SDKs you need
import { initializeApp } from "firebase/app";
import { getAnalytics } from "firebase/analytics";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
  apiKey: "AIzaSyA5LPtoF1xMm-ufRxYhRS9PwR_n52Cr5Qc",
  authDomain: "engauge-hackmit.firebaseapp.com",
  databaseURL: "https://engauge-hackmit-default-rtdb.firebaseio.com",
  projectId: "engauge-hackmit",
  storageBucket: "engauge-hackmit.appspot.com",
  messagingSenderId: "337114195535",
  appId: "1:337114195535:web:eca9ac6baf03cbfeb5ac3a",
  measurementId: "G-CXG5NRDYDL"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const analytics = getAnalytics(app);

import { getDatabase, ref, set } from "firebase/database";

function writeUserData() {
  firebase.database().ref("User").set({
    value: document.getElementById("value").value
  })
}