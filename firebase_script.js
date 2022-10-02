const firebaseConfig = {
  apiKey: "AIzaSyAD4TNhjn9wNEpAf6UK8hjweYg4h-37_SU",
  authDomain: "engaugetest-fe044.firebaseapp.com",
  databaseURL: "https://engaugetest-fe044-default-rtdb.firebaseio.com",
  projectId: "engaugetest-fe044",
  storageBucket: "engaugetest-fe044.appspot.com",
  messagingSenderId: "213988430594",
  appId: "1:213988430594:web:07521e5fea8f935106681b"
};

// initialize firebase
firebase.initializeApp(firebaseConfig);

// reference your database
var contactFormDB = firebase.database().ref("contactForm");

document.getElementById("contactForm").addEventListener("submit", submitForm);

function submitForm(e) {
  e.preventDefault();

  var name = getElementVal("name");
  // var emailid = getElementVal("emailid");
  // var msgContent = getElementVal("msgContent");
  saveMessages(name);
  // saveMessages(name, emailid, msgContent);

  //   enable alert
  document.querySelector(".alert").style.display = "block";

  //   remove the alert
  setTimeout(() => {
    document.querySelector(".alert").style.display = "none";
  }, 3000);

  //   reset the form
  document.getElementById("contactForm").reset();
}

// const saveMessages = (name, emailid, msgContent) => {
//   var newContactForm = contactFormDB.push();

//   newContactForm.set({
//     name: name,
//     emailid: emailid,
//     msgContent: msgContent,
//   });
// };
const saveMessages = (name) => {
  var newContactForm = contactFormDB.push();

  newContactForm.set({
    name: name,
  });
};

const getElementVal = (id) => {
  return document.getElementById(id).value;
};

var slider = document.getElementById("name");
var output = document.getElementById("bar");
output.innerHTML = slider.value; // Display the default slider value

// Update the current slider value (each time you drag the slider handle)
slider.oninput = function() {
    output.innerHTML = this.value;
}
