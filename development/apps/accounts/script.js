let work_data;

window.onload = function () {
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
      work_data = Object.values(data.data);
      console.log(work_data);
    });
}

function showUnlinked(group) {
  reg = new RegExp(group); 
  //console.log("check");
  for (let i = 0; i < work_data.length; i++) {
    //console.log(work_data[i].party);
    if (reg.test(work_data[i].party)) {
      //console.log("check");
      newRecord(i);
    }
  }
}

function newRecord(i) {
  //console.log('check');
  if (document.getElementById('carousel').innerHTML !== null) {
    document.getElementById('carousel').innerHTML = null;
  }

  let elem = document.getElementById("carousel");
  let car_elem;
  car_elem = document.createElement('div');

  //console.log(document.querySelector('.active'));
  if (!document.querySelector('.active')) {
    //console.log('here');
    car_elem.classList.add('carousel-item', 'active');
  }
  else {
    car_elem.classList.add('carousel-item');
  }
  //console.log(elem);
  elem.appendChild(car_elem);
  //console.log(car_elem);
  car_elem.appendChild(newCard(i));

  elem = document.getElementById('carouselExampleControls');
  if (!document.querySelector('.carousel-control-prev')) {
    elem.appendChild(addButton(elem, 'prev'));
    elem.appendChild(addButton(elem, 'next'));
  }
  if(!document.querySelector('btn-outline-primary')) {
    //console.log('hi');
  }
  //elem.appendChild(addButton());
}

function newCard (i) {
  let card = document.createElement('div');
  card.classList.add('card');
  card.style.width="30rem";
  card.innerHTML = "<div class='card-body'><h5 class='card-title'>Студент</h5>" +
  "<h6 class='card-subtitle mb-2 text-muted'>"+ work_data[i].name + " " + work_data[i].surname + " " + work_data[i].middlename + "</h6>" +
  "<span class='card-text'>Факультет: "+ work_data[i].department + "</span><br>" +
  "<span class='card-text'>Группа: " + work_data[i].party + "</span><br>";
  return card;
}

function addButton(parent, direction) {
  let btn = document.createElement('button');
  btn.classList.add('carousel-control-'+direction);
  btn.setAttribute('type', "button");
  btn.setAttribute('data-bs-target', "#"+parent.id);
  btn.setAttribute('data-bs-slide', direction);
  btn.innerHTML = "<span class='carousel-control-"+direction+"-icon' aria-hidden='true'></span>" +
  "<span class='visually-hidden'></span>";
  //console.log(btn);
  return btn;

}

//работает, но (не опять, а снова)
//токен нужно принимать, а этот метод не работает
//и еще нужно кодировать данные в урлу, а не в тело запроса 
function teamsRequest() {
  fetch('https://graph.microsoft.com/v1.0/users?$search=%22displayName:Арсеній%22', {
    method: "GET",
    headers: new Headers({
      'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJub25jZSI6ImVQVjhHWWFtNDJ4SzJyMmFscDB2bU5uNnVXOHVqY2p0UHpwdi14alZnNG8iLCJhbGciOiJSUzI1NiIsIng1dCI6Im5PbzNaRHJPRFhFSzFqS1doWHNsSFJfS1hFZyIsImtpZCI6Im5PbzNaRHJPRFhFSzFqS1doWHNsSFJfS1hFZyJ9.eyJhdWQiOiJodHRwczovL2dyYXBoLm1pY3Jvc29mdC5jb20iLCJpc3MiOiJodHRwczovL3N0cy53aW5kb3dzLm5ldC84ZWZlZjk4ZS00YjU4LTQyOTMtOGZiZS00MDhhNjk3MzE0NWEvIiwiaWF0IjoxNjIyNzc1MzAyLCJuYmYiOjE2MjI3NzUzMDIsImV4cCI6MTYyMjc3OTIwMiwiYWlvIjoiRTJaZ1lOQi91THN5MlBXbjYxdjlQUjFuSC9zRUFRQT0iLCJhcHBfZGlzcGxheW5hbWUiOiJNUyBUZWFtcyBVc2VycyBNb2R1bGUiLCJhcHBpZCI6ImIxMmVlNWMwLTU0YWYtNGI4Yy1hZmFhLWY1NWFhZmRhYTE2NCIsImFwcGlkYWNyIjoiMSIsImlkcCI6Imh0dHBzOi8vc3RzLndpbmRvd3MubmV0LzhlZmVmOThlLTRiNTgtNDI5My04ZmJlLTQwOGE2OTczMTQ1YS8iLCJpZHR5cCI6ImFwcCIsIm9pZCI6IjExMjU0MjNhLWNjY2UtNDU4MC05MTc2LTZiMzlmZTdmYTNhNSIsInJoIjoiMC5BU0VBanZuLWpsaExrMEtQdmtDS2FYTVVXc0RsTHJHdlZJeExyNnIxV3FfYW9XUWhBQUEuIiwicm9sZXMiOlsiVXNlci5SZWFkV3JpdGUuQWxsIiwiRGlyZWN0b3J5LlJlYWRXcml0ZS5BbGwiLCJVc2VyLk1hbmFnZUlkZW50aXRpZXMuQWxsIl0sInN1YiI6IjExMjU0MjNhLWNjY2UtNDU4MC05MTc2LTZiMzlmZTdmYTNhNSIsInRlbmFudF9yZWdpb25fc2NvcGUiOiJFVSIsInRpZCI6IjhlZmVmOThlLTRiNTgtNDI5My04ZmJlLTQwOGE2OTczMTQ1YSIsInV0aSI6IkNNazdENTdxWVVtUm94dEpTckVyQWciLCJ2ZXIiOiIxLjAiLCJ3aWRzIjpbIjA5OTdhMWQwLTBkMWQtNGFjYi1iNDA4LWQ1Y2E3MzEyMWU5MCJdLCJ4bXNfdGNkdCI6MTQ5NTcxNDMzOH0.entYNZcvA3T2sy4ychGHItzklUjXxdm_sMGqO1YdQ1qgZyLF7nIeZ2o02i4RMHc_O4I4XQtcnGUK2OUzUH470reryx85Z8tenuCts8ImapGQsZQ6FRYPR0jL7RoLkE6nUOKuD8vZFeIa6P3UA0rhTy3V1tH-fELaIKhmUsBKS4VMNU6qjTSHFXXMLpL8-T2KIPIZbu5NY2TxilXiIGxC9C-YvVSBd04tBxheL2m-RYByrht67QPW-wUOAJI51G6SBeZa-4ngW3BVA7-0QpNptdA1-UnlpHtABgWjUyyE20K-PJ7sxJVNdvoxOUueOwPDoNq7fSJyqWyawXQPBxDdvQ',
      'ConsistencyLevel': 'eventual',
      'Content-Type': 'application/json',
      'Accept': '*/*'
    }),

  })
  .then((response) => {
    return response.json();
  })
  .then((data) => {
    console.log(data);
    return data;
  });
  console.log();
}


//метод работает, но
//нужно вставить аргумент:
//personID и использовать вместо work_data[0].PersonID
function editAccount(id) {
  fetch("https://account.pnit.od.ua/account/edit", {
    method: 'POST',
    headers: new Headers({
      'Content-type': 'application/x-www-form-urlencoded'
    }),
    body: "type=person&owner="+work_data[0].PersonID+"&data="+JSON.stringify({'isFound': 'qwerty'})
  })
  .then((response) => {
    return response.json();
  })
  .then((data) => {
    console.log(data);
  })
}


//этот метод тоже работает
//заменить входные данные
//и все будет потрясно
function linkAccount(person) {
  fetch("https://account.pnit.od.ua/account/link", {
    method: 'POST',
    headers: new Headers({
      'Content-type': 'application/x-www-form-urlencoded'
    }),
    body: "person=a2874a68-a5f3-11eb-86f4-0242ac130003&guid=468328a4-a4f8-11eb-b425-0242ac130004&type=link"
  })
  .then((response) => {
    return response.json();
  })
  .then((data) => {
    console.log(data);
  });
}