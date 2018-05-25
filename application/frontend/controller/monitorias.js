Ext.define('CImeetsExtJS.controller.monitorias', {
    extend: 'Ext.app.Controller',
    stores: ['monitorias'],
    models: ['monitorias'],
    views:  ['monitorias.Grid', 'monitorias.Window', 'monitorias.Form'],

    refs: [{
        ref: 'monitoriasGrid',
        selector: 'monitorias-grid'
    }],
    
    init: function() {
        this.contextmenu = Ext.create('Ext.menu.Menu', {
            id: 'monitorias-grid-ctx',
            items: [{
                text: 'Edit',
                action: 'update-monitorias',
                iconCls: 'fam book_edit'
            }, {
                text: 'Delete',
                action: 'delete-monitorias',
                iconCls: 'fam delete'
            }]
        });
        
        this.control({
            'monitorias-grid': {
                itemdblclick: this.addEditMonitorias,
                itemcontextmenu: this.listContextMenu
            },
            'monitorias-grid > toolbar > button[action=add]': {
                click: this.addEditMonitorias
            },
            'menu[id=monitorias-grid-ctx] > menuitem': {
                click: this.listContextMenuItem
            },            
            'monitorias-window button[action=save]': {
                click: this.saveMonitorias
            }
        });
    },
    
    listContextMenu: function(view, record, item, index, event) {
        event.stopEvent();
        view.up('panel').getSelectionModel().select(index);
        this.contextmenu.showAt(event.getXY());
        return false;
    },

    listContextMenuItem: function(item) {
        var grid = this.getMonitoresGrid(),
            record = grid.getSelectionModel().getLastSelected();
       
        if (item.action === 'update-monitorias') {
            this.addEditMonitorias(grid, record);
        }
        
        if (item.action === 'delete-monitorias') {
            this.deleteMonitorias(grid, record);
        }      
    },
    
    addEditMonitorias: function(grid, record) {
        var window = Ext.create('CImeetsExtJS.view.monitorias.Window'),
            form = window.down('form');
        
        if(record.data) {
            form.loadRecord(record);
        }
        
        window.show();
    },    
    
    saveMonitorias: function(button) {
        var win    = button.up('window'),
            form   = win.down('form'),
            record = form.getRecord(),
            values = form.getValues();
        
        if (form.getForm().isValid()) {
            if (values.id > 0){
                record.set(values);
            } else{
                record = Ext.create('CImeetsExtJS.model.monitorias');
                record.set(values);
                this.getMonitoriasStore().add(record);
            }
            
            win.close();
            this.getMonitoriasStore().sync().load();
        }
    },
    
    deleteMonitorias: function(grid, record) {
        if (record) {
            Ext.Msg.confirm('Delete', 'Realmente quieres eliminar monitorias?', function(btn) {
                if (btn === 'yes') {
                    grid.getStore().remove(record);
                    grid.getStore().sync();               
                }
            });
        }
    }
});
