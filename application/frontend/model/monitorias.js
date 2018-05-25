Ext.define('CImeetsExtJS.model.monitorias', {
    extend: 'Ext.data.Model',
	
	fields: [{
        name: 'Id_monitorias',
        type: 'int'
    },{
        name: 'materia',
        type: 'string'
    },{
        name: 'monitor',
        type: 'string'
    },{
        name: 'fecha',
        type: 'date'
    },{
        name: 'salon',
        type: 'string'
    }],
    
    idProperty: 'Id_monitor',
    
    proxy: {
        type: 'custProxy',
        api: {
        	create: 'monitorias/create', 
            read: 'monitorias/read',
            update: 'monitorias/update',
            destroy: 'monitorias/destroy',
        },
        reader: {
            type: 'json',
            root: 'items',
            totalProperty: 'total',
            successProperty: 'success'
        },
        writer: {
            type: 'json',
            writeAllFields: true,
            encode: true,
            root: 'items'
        }
    }
});