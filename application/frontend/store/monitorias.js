Ext.define('CImeetsExtJS.store.monitorias', {
    extend: 'Ext.data.Store',
    model: 'CImeetsExtJS.model.monitorias',
    autoLoad: true,
	remoteSort: true,
    pageSize: 45,
    sorters: [{
		property: 'Id_monitorias',
		direction: 'desc'
    }]
});