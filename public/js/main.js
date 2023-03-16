'use strict';

const editTagForm = document.forms.tagEditForm;

document
  .getElementById('tagEditModal')
  .addEventListener('show.bs.modal', (e) => {
    let tagButton = e.relatedTarget;
    let tagId = tagButton.dataset.tagId;
    let tagTitle = tagButton.dataset.tagTitle;

    editTagForm.action = `tags/${tagId}`;
    editTagForm.title.value = tagTitle;

    console.log(editTagForm);
  });
