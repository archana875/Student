document.addEventListener('DOMContentLoaded', function() {
    loadTeachers();
  });

  function saveTeacher() {
    let teachers = JSON.parse(localStorage.getItem('teachers')) || [];
    let teacher = {
      firstName: document.getElementById('firstName').value,
      lastName: document.getElementById('lastName').value,
      email: document.getElementById('email').value,
      phone: document.getElementById('phone').value,
      className: document.getElementById('className').value,
    };

    teachers.push(teacher);
    localStorage.setItem('teachers', JSON.stringify(teachers));
    loadTeachers();
    document.getElementById('teacherForm').reset();
  }

  function loadTeachers() {
    let teachers = JSON.parse(localStorage.getItem('teachers')) || [];
    let tbody = document.getElementById('teacherTable').getElementsByTagName('tbody')[0];
    tbody.innerHTML = '';

    teachers.forEach((teacher, index) => {
      let row = tbody.insertRow();
      row.insertCell().innerText = index + 1;
      row.insertCell().innerText = teacher.firstName;
      row.insertCell().innerText = teacher.lastName;
      row.insertCell().innerText = teacher.email;
      row.insertCell().innerText = teacher.phone;
      row.insertCell().innerText = teacher.className;
      let deleteCell = row.insertCell();
      let deleteButton = document.createElement('button');
      deleteButton.innerText = 'Delete';
      deleteButton.onclick = function() {
        deleteTeacher(index);
      };
      deleteCell.appendChild(deleteButton);
    });
  }

  function deleteTeacher(index) {
    let teachers = JSON.parse(localStorage.getItem('teachers')) || [];
    teachers.splice(index, 1);
    localStorage.setItem('teachers', JSON.stringify(teachers));
    loadTeachers();
  }