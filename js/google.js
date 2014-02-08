google.load("gdata", "2");
var contactsService;

function setupContactsService() {
  contactsService = new google.gdata.contacts.ContactsService('exampleCo-exampleApp-1.0');
}

function logMeIn() {
  var scope = 'https://www.google.com/m8/feeds';
  var token = google.accounts.user.login(scope);
}

function initFunc() {
  setupContactsService();
  logMeIn();
//  getMyContacts();
}



function google_import() {
  initFunc();
}
