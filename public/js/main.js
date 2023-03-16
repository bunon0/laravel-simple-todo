'use strict';

const tagEditForm = document.forms.tagEditForm;
const tagDeleteFrom = document.forms.tagDeleteForm;

document
  .getElementById('tagEditModal')
  .addEventListener('show.bs.modal', (e) => {
    let tagButton = e.relatedTarget;
    let tagId = tagButton.dataset.tagId;
    let tagTitle = tagButton.dataset.tagTitle;

    tagEditForm.action = `tags/${tagId}`;
    tagEditForm.title.value = tagTitle;
  });

document
  .getElementById('tagDeleteModal')
  .addEventListener('show.bs.modal', (e) => {
    let tagButton = e.relatedTarget;
    let tagId = tagButton.dataset.tagId;
    let tagTitle = tagButton.dataset.tagTitle;

    tagDeleteFrom.action = `tags/${tagId}`;

    document.getElementById(
      'tagDeleteModalLabel'
    ).textContent = `【${tagTitle}】を削除してもよろしいですか？`;
  });
