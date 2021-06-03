let tagret;

window.onload = function loading() {
    var elem = document.createElement('button');
    elem.addEventListener('click', showUnlinked);
    elem.innerHTML = 'Студенты без аккаунтов';
    document.body.insertAdjacentElement('beforeend', elem);

    elem = document.createElement('button');
    elem.addEventListener('click', deleteAccount);
}

function showUnlinked() {
    fetch('https://account.pnit.od.ua/account/list',
    {
      method: "POST",
      //credentials: 'same-origin',
      body: 'type=personsunlinked&user=31e80b14-a4f8-11eb-b425-0242ac130004',
      headers: new Headers({
        'Content-Type': 'application/x-www-form-urlencoded', // <-- Specifying the Content-Type
      }),
    })
    .then((response) => {
      return response.json();
    })
    .then((data) => {
      data = Object.values(data.data);
      console.log(data);
      for(let i = 0; i < data.length; i++) {
        var elem = document.createElement("div");
        elem.id = "person" + i;
        elem.addEventListener('click', (event) => {
        target = event.target;
        });
        elem.innerHTML = data[i].name + " " + data[i].surname + " " + data[i].middlename;
        document.body.insertAdjacentElement('beforeend', elem);
        }
    });
}

function deleteAccount() {
    target.remove();
}

function showLinked() {

}

function linkAccount() {

}