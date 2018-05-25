Ext.define('CImeetsExtJS.controller.monitores', {
    extend: 'Ext.app.Controller',
    stores: ['monitores'],
    models: ['monitores'],
    views:  ['monitores.Grid', 'monitores.Window', 'monitores.Form'],

    refs: [{
        ref: 'monitoresGrid',
        selector: 'monitores-grid'
    }],
    
    init: function() {
        this.contextmenu = Ext.create('Ext.menu.Menu', {
            id: 'monitores-grid-ctx',
            items: [{
                text: 'Edit',
                action: 'update-monitores',
                iconCls: 'fam book_edit'
            }, {
                text: 'Delete',
                action: 'delete-monitores',
                iconCls: 'fam delete'
            }]
        });
        
        this.control({
            'monitores-grid': {
                itemdblclick: this.addEditMonitores,
                itemcontextmenu: this.listContextMenu
            },
            'monitores-grid > toolbar > button[action=add]': {
                click: this.addEditMonitores
            },
            'menu[id=monitores-grid-ctx] > menuitem': {
                click: this.listContextMenuItem
            },            
            'monitores-window button[action=save]': {
                click: this.savemonitores
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
       
        if (item.action === 'update-monitores') {
            this.addEditMonitores(grid, record);
        }
        
        if (item.action === 'delete-monitores') {
            this.deleteMonitores(grid, record);
        }      
    },
    
    addEditMonitores: function(grid, record) {
        var window = Ext.create('CImeetsExtJS.view.monitores.Window'),
            form = window.down('form');
        
        if(record.data) {
            form.loadRecord(record);
        }
        
        window.show();
    },    
    
    saveMonitores: function(button) {
        var win    = button.up('window'),
            form   = win.down('form'),
            record = form.getRecord(),
            values = form.getValues();
        
        if (form.getForm().isValid()) {
            if (values.id > 0){
                record.set(values);
            } else{
                record = Ext.create('CImeetsExtJS.model.monitores');
                record.set(values);
                this.getMonitoresStore().add(record);
            }
            
            win.close();
            this.getMonitoresStore().sync().load();
        }
    },
    
    deleteMovie: function(grid, record) {
        if (record) {
            Ext.Msg.confirm('Delete', 'Realmente quieres eliminar monitor?', function(btn) {
                if (btn === 'yes') {
                    grid.getStore().remove(record);
                    grid.getStore().sync();               
                }
            });
        }
    }
});
