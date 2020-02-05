
define(['TYPO3/CMS/Backend/Storage/Persistent'], function(PersistentStorage) {
    let Quickedit = {
      toggle: '.quick-edit-toggle-button',
      container: '#quick-edit'
    };

    Quickedit.getIdentifier = function(pageId) {
        return 'quickedit.visible.' + pageId;
    }

    $(Quickedit.container).on('shown.bs.collapse', function () {
        let $me = $(this)[0];
        let identifier = Quickedit.getIdentifier($me.dataset.page);

        PersistentStorage.set(identifier, 1);
    })

    $(Quickedit.container).on('hidden.bs.collapse', function () {
        let $me = $(this)[0];
        let identifier = Quickedit.getIdentifier($me.dataset.page);

        PersistentStorage.set(identifier, 0);
    })
});