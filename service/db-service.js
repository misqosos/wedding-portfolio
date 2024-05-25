
async function getCorrectPerson(personName) {
    const response = await fetch('https://jessiewoody.eu/backend/person/fetchFromDb.php', {
        method: "POST",
        body: personName,
    });
    const json = await response.json();
    return json;
}
  
function postPerson(formular) {
    fetch('https://jessiewoody.eu/backend/person/postToDb.php', {
        method: "POST",
        body: JSON.stringify(formular)
    })
        .then((response) => {console.log(response.json())})
        .then((json) => console.log(json));
}
  
function postVisit(name) {
    fetch('https://jessiewoody.eu/backend/person/postToDb.php', {
        method: "POST",
        body: JSON.stringify(name)
    })
}