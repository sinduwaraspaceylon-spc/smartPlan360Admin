<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document Manager</title>
<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
  }

  header {
    display: flex;
    justify-content: center;
    gap: 10px;
    background-color: #333;
    padding: 10px;
  }

  header button {
    color: white;
    background: #555;
    border: none;
    padding: 10px 15px;
    cursor: pointer;
  }

  header button.active {
    background: #007bff;
  }

  section {
    padding: 20px;
  }

  .hidden {
    display: none;
  }

  ul {
    list-style: none;
    padding: 0;
  }

  ul li {
    border: 1px solid #ddd;
    padding: 8px;
    margin-bottom: 5px;
    cursor: pointer;
  }

  ul li.selected {
    background: #cce5ff;
  }

  .form-field {
    display: flex;
    margin-bottom: 8px;
  }

  .form-field input {
    flex: 1;
    padding: 5px;
  }
</style>
</head>
<body>

<header>
  <button id="showDocsBtn" class="active">Documents</button>
  <button id="newDocBtn">New Document</button>
  <button id="deleteBtn">Delete</button>
</header>

<section id="documentsSection">
  <h2>Existing Documents</h2>
  <ul id="docList">
    <li>Document A</li>
    <li>Document B</li>
    <li>Document C</li>
  </ul>
  <button id="editBtn">Edit Selected</button>
</section>

<section id="newDocSection" class="hidden">
  <h2>Create New Document</h2>
  <div id="fieldsContainer">
    <div class="form-field"><input type="text" placeholder="Field 1"></div>
  </div>
  <button id="addFieldBtn">Add Field</button>
</section>

<script>
  const showDocsBtn = document.getElementById('showDocsBtn');
  const newDocBtn = document.getElementById('newDocBtn');
  const deleteBtn = document.getElementById('deleteBtn');
  const editBtn = document.getElementById('editBtn');

  const docsSection = document.getElementById('documentsSection');
  const newDocSection = document.getElementById('newDocSection');
  const docList = document.getElementById('docList');
  const fieldsContainer = document.getElementById('fieldsContainer');
  const addFieldBtn = document.getElementById('addFieldBtn');

  let mode = 'view'; // 'view' | 'add'
  let selectedDoc = null;

  // Switch between document list and new document form
  showDocsBtn.onclick = () => switchMode('view');
  newDocBtn.onclick = () => switchMode('add');

  function switchMode(newMode) {
    mode = newMode;
    showDocsBtn.classList.toggle('active', mode === 'view');
    newDocBtn.classList.toggle('active', mode === 'add');
    docsSection.classList.toggle('hidden', mode !== 'view');
    newDocSection.classList.toggle('hidden', mode !== 'add');
    selectedDoc = null;
    updateDeleteButton();
  }

  // Select document
  docList.addEventListener('click', e => {
    if (e.target.tagName === 'LI') {
      docList.querySelectorAll('li').forEach(li => li.classList.remove('selected'));
      e.target.classList.add('selected');
      selectedDoc = e.target;
      updateDeleteButton();
    }
  });

  // Add new field in form mode
  addFieldBtn.onclick = () => {
    const field = document.createElement('div');
    field.className = 'form-field';
    field.innerHTML = `<input type="text" placeholder="New field">`;
    fieldsContainer.appendChild(field);
  };

  // Delete button — behaves differently by mode
  deleteBtn.onclick = () => {
    if (mode === 'view' && selectedDoc) {
      selectedDoc.remove();
      selectedDoc = null;
    } else if (mode === 'add') {
      // Delete the last added field
      const fields = fieldsContainer.querySelectorAll('.form-field');
      if (fields.length > 0) fields[fields.length - 1].remove();
    }
    updateDeleteButton();
  };

  // Example "Edit" action
  editBtn.onclick = () => {
    if (selectedDoc) {
      const newName = prompt("Edit document name:", selectedDoc.textContent);
      if (newName) selectedDoc.textContent = newName;
    }
  };

  function updateDeleteButton() {
    if (mode === 'view') {
      deleteBtn.disabled = !selectedDoc;
    } else {
      deleteBtn.disabled = fieldsContainer.querySelectorAll('.form-field').length === 0;
    }
  }
</script>

</body>
</html>
