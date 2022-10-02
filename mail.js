const firebaseConfig = {
    //   copy your firebase config informations
    apiKey: "AIzaSyDpsycu5q8sethB56YtvHQARiFwBJoQ0cw",

    authDomain: "hackmit2022-a8c8c.firebaseapp.com",
  
    databaseURL: "https://hackmit2022-a8c8c-default-rtdb.firebaseio.com",
  
    projectId: "hackmit2022-a8c8c",
  
    storageBucket: "hackmit2022-a8c8c.appspot.com",
  
    messagingSenderId: "985956164997",
  
    appId: "1:985956164997:web:991819592502638ab810ec"
  
  };
  
// initialize firebase
firebase.initializeApp(firebaseConfig);

// reference your database
var loginDB = firebase.database().ref("login");

document.getElementById("login").addEventListener("submit", submitForm);

function submitForm(e) {
e.preventDefault();

var course = getElementVal("courseid");
var emailid = getElementVal("emailid");

saveMessages(course, emailid);

//   reset the form
document.getElementById("login").reset();
}

const saveMessages = (course, emailid) => {
var newLogin = loginDB.push();

newLogin.set({
    course: course,
    emailid: emailid,
});
};
const getElementVal = (id) => {
    return document.getElementById(id).value;

};
