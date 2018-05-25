Ext.define('CImeetsExtJS.model.monitores', {
    extend: 'Ext.data.Model',
	
	fields: [{
        name: 'Id_monitor',
        type: 'int'
    },{
        name: 'nombres',
        type: 'string'
    },{
        name: 'apellidos',
        type: 'string'
    },{
        name: 'programa',
        type: 'string'
    },{
        name: 'semestre',
        type: 'string'

    },{
        name: 'cedula',
        type: 'int'

    },{
        name: 'email',
        type: 'string'
    }],
    
    idProperty: 'Id_monitor',
    
    proxy: {
        type: 'custProxy',
        api: {
        	create: 'monitor/create', 
            read: 'monitor/read',
            update: 'monitor/update',
            destroy: 'monitor/destroy',
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