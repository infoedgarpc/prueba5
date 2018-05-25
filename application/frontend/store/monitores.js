Ext.define('CImeetsExtJS.store.monitores', {
    extend: 'Ext.data.Store',
    model: 'CImeetsExtJS.model.monitores',
    autoLoad: true,
	remoteSort: true,
    pageSize: 45,
    sorters: [{
		property: 'Id_monitor',
		direction: 'desc'
    }]
});