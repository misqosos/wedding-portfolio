
async function getCorrectPerson(personName) {
    const response = await fetch('https://'+window.location.host+'/backend/person/fetchFromDb.php', {
        method: "POST",
        body: personName,
    });
    const json = await response.json();
    return json;
}
  
function postPerson(formular) {
    fetch('https://'+window.location.host+'/backend/person/postToDb.php', {
        method: "POST",
        body: JSON.stringify(formular)
    })
        .then((response) => {console.log(response.json())})
        .then((json) => console.log(json));
}
  
function postVisit(name) {
    fetch('https://'+window.location.host+'/backend/person/postToDb.php', {
        method: "POST",
        body: JSON.stringify(name)
    })
}