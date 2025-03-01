
const students = JSON.parse(localStorage.getItem('students')) || [];
const attendance = JSON.parse(localStorage.getItem('attendance')) || [];
const studentsTable = document.querySelector('#studentsTable tbody');
const attendanceTable = document.querySelector('#attendanceTable tbody');

function renderStudents() {
    studentsTable.innerHTML = '';
    students.forEach(student => {
        const row = document.createElement('tr');
        row.innerHTML = `
                    <td>${student.no}</td>
                    <td>${student.firstName}</td>
                    <td>${student.lastName}</td>
                    <td>${student.admissionNo}</td>
                    <td>${student.class}</td>
                    <td><input type="checkbox" data-no="${student.no}"></td>
                `;
        studentsTable.appendChild(row);
    });
}

function renderAttendance() {
    attendanceTable.innerHTML = '';
    attendance.forEach(record => {
        const row = document.createElement('tr');
        row.innerHTML = `
                    <td>${record.date}</td>
                    <td>${record.no}</td>
                    <td>${record.firstName}</td>
                    <td>${record.lastName}</td>
                    <td>${record.admissionNo}</td>
                    <td>${record.class}</td>
                    <td>${record.present ? 'Yes' : 'No'}</td>
                `;
        attendanceTable.appendChild(row);
    });
}

document.getElementById('addStudentForm').addEventListener('submit', function (event) {
    event.preventDefault();
    const no = document.getElementById('no').value;
    const firstName = document.getElementById('firstName').value;
    const lastName = document.getElementById('lastName').value;
    const admissionNo = document.getElementById('admissionNo').value;
    const className = document.getElementById('class').value;
    students.push({ no, firstName, lastName, admissionNo, class: className });
    localStorage.setItem('students', JSON.stringify(students));
    renderStudents();
});

document.getElementById('attendanceForm').addEventListener('submit', function (event) {
    event.preventDefault();
    const date = new Date().toLocaleDateString();
    students.forEach(student => {
        const present = document.querySelector(`input[data-no="${student.no}"]`).checked;
        attendance.push({ date, ...student, present });
    });
    localStorage.setItem('attendance', JSON.stringify(attendance));
    renderAttendance();
});

renderStudents();
renderAttendance();
