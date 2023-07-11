application.run(function ($rootScope) {

    $rootScope.startDashboardBlockUi = function() {
        $.blockUI({ 
            message: '<i class="icon-spinner4 spinner"></i>',
            overlayCSS: {
                backgroundColor: '#1b2024',
                opacity: 0.8,
                zIndex: 1200,
                cursor: 'wait'
            },
            css: {
                border: 0,
                color: '#fff',
                padding: 0,
                zIndex: 1201,
                backgroundColor: 'transparent'
            },
        });
    }

    $rootScope.stopDashboardBlockUi = function() {
        $.unblockUI(); 
    }

});
