document.addEventListener('DOMContentLoaded', () => {
    const studentForm = document.getElementById('student-form');
    const className = document.getElementById('className');
    const teacherName = document.getElementById('teacherName');
    const studentTable = document.getElementById('studentTable').getElementsByTagName('tbody')[0];

    function loadStudents() {
      const students = JSON.parse(localStorage.getItem('students')) || [];
      students.forEach((student, index) => addStudentToTable(student, index + 1));
    }

    function addStudentToTable(student, number) {
      const row = studentTable.insertRow();
      row.insertCell(0).textContent = number;
      row.insertCell(1).textContent = student.className;
      row.insertCell(2).textContent = student.teacherName;

      const deleteCell = row.insertCell(3);
      const deleteButton = document.createElement('button');
      deleteButton.textContent = 'Delete';
      deleteButton.addEventListener('click', () => {
        deleteStudent(number - 1);
      });
      deleteCell.appendChild(deleteButton);
    }

    function deleteStudent(index) {
      let students = JSON.parse(localStorage.getItem('students')) || [];
      students.splice(index, 1);
      localStorage.setItem('students', JSON.stringify(students));
      refreshTable();
    }

    function refreshTable() {
      studentTable.innerHTML = '';
      loadStudents();
    }

    studentForm.addEventListener('submit', (e) => {
      e.preventDefault();
      const cls = className.value.trim();
      const teacher = teacherName.value.trim();
      if (cls && teacher) {
        const students = JSON.parse(localStorage.getItem('students')) || [];
        const student = {
          className: cls,
          teacherName: teacher
        };
        students.push(student);
        localStorage.setItem('students', JSON.stringify(students));
        addStudentToTable(student, students.length);
        className.value = '';
        teacherName.value = '';
      }
    });

    loadStudents();
  });