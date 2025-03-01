let studentData = JSON.parse(localStorage.getItem('studentData')) || [];

function saveStudent() {
    const firstName = document.getElementById('firstName').value;
    const lastName = document.getElementById('lastName').value;
    const admissionNo = document.getElementById('admissionNo').value;
    const className = document.getElementById('className').value;

    const newStudent = {
        number: studentData.length + 1,
        firstName,
        lastName,
        admissionNo,
        className
    };

    studentData.push(newStudent);
    localStorage.setItem('studentData', JSON.stringify(studentData));
    displayStudents();
    document.getElementById('studentForm').reset();
}

function displayStudents() {
    const studentTableBody = document.getElementById('studentTable').getElementsByTagName('tbody')[0];
    studentTableBody.innerHTML = '';

    studentData.forEach((student, index) => {
        const row = studentTableBody.insertRow();

        row.insertCell(0).innerText = student.number;
        row.insertCell(1).innerText = student.firstName;
        row.insertCell(2).innerText = student.lastName;
        row.insertCell(3).innerText = student.admissionNo;
        row.insertCell(4).innerText = student.className;
        const actionsCell = row.insertCell(5);
        const deleteButton = document.createElement('button');
        deleteButton.innerText = 'Delete';
        deleteButton.onclick = function() {
            deleteStudent(index);
        };
        actionsCell.appendChild(deleteButton);
    });
}

function deleteStudent(index) {
    studentData.splice(index, 1);
    studentData.forEach((student, i) => student.number = i + 1);
    localStorage.setItem('studentData', JSON.stringify(studentData));
    displayStudents();
}

document.addEventListener('DOMContentLoaded', displayStudents);
