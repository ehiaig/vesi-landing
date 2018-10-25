<?php

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth', 'accesslogin'], function() {

    Route::group(['namespace' => 'Dashboard'], function() {

    	//	Show dashboard
        Route::get('/', [
            'as' => 'dashboard.show.index',
            'uses' => 'DashboardController@index'
        ]);
    });

    //Show Invoice index page
    Route::get('/invoice/', [
        'as' => 'invoice.show.index',
        'uses' => 'InvoiceController@index'
    ]);

    //Show Milestone index page
    Route::get('/invoice/all-ms', [
        'as' => 'invoice.show.all-ms',
        'uses' => 'InvoiceController@allMilestones'
    ]);

    /*** BASIC INVOICE **/
    //Save the basic invoice
    Route::post('save/invoice/basic', [
        'as' => 'save.invoice.basic',
        'uses' => 'InvoiceController@createBasicInvoice',
    ]);

    //  Show preview of Basic Invoice
    Route::get('/invoice/preview/{uuid}', [
        'as' => 'invoice.show.preview',
        'uses' => 'InvoiceController@previewInvoice'
    ]);

    //Send Basic Invoice via email
    Route::get('/send/escrow/basic-invoice/{uuid}', [
        'as' => 'send.escrow.basic-invoice',
        'uses' => 'InvoiceController@sendBasicInvoice'
    ]);

    //Edit Basic draft Invoice
    Route::match(['GET', 'POST'], '/invoice/edit/{uuid}/edit', [
        'as' => 'invoice.show.edit',
        'uses' => 'InvoiceController@editInvoice',
    ]); 
    /*** END OF BASIC INVOICE **/


    /*** PROFESSIONAL INVOICE **/

    //Save the newly created professional Invoice
    Route::post('save/invoice/professional', [
        'as' => 'save.invoice.professional',
        'uses' => 'InvoiceController@createProfessionalInvoice',
    ]);

    //	Show current Professional Invoice in a page called single and add items to it
    Route::get('/invoice/single/{uuid}', [
        'as' => 'invoice.show.single',
        'uses' => 'InvoiceController@singleInvoice'
    ]);

    //Add Items to current invoices
    Route::post('/invoice/single/{uuid}', [
        'as' => 'item.save',
        'uses' => 'ItemController@createItem',
    ]);

    //Delete Items in an Invoice
    Route::get('/invoice/single/item/delete/{uuid?}', [
        'as' => 'item.delete',
        'uses' => 'ItemController@delete',
    ]);

    //Send Professional Invoice via email
    Route::get('/send/escrow/invoice/{uuid}', [
        'as' => 'send.escrow.invoice',
        'uses' => 'InvoiceController@sendInvoiceEmail'
    ]);

    /*** END OF PROFESSIONAL INVOICE **/ 
    

    /***MILESTONE INVOICE BEGINS**/

    //Save
    Route::post('save/invoice/milestone', [
        'as' => 'save.invoice.milestone',
        'uses' => 'InvoiceController@createMilestoneInvoice',
    ]);

    //Show
    Route::get('/invoice/set-milestones/{uuid}', [
        'as' => 'invoice.show.set-milestones',
        'uses' => 'InvoiceController@viewMilestoneInvoice'
    ]);

    //Add Milestone
    Route::post('/invoice/set-milestones/{uuid}', [
        'as' => 'milestoneitem.save',
        'uses' => 'MilestoneItemController@createMilestone',
    ]);

    //Delete Milestone Items
    Route::get('/invoice/set-milestones/milestoneitem/delete/{uuid?}', [
        'as' => 'milestoneitem.delete',
        'uses' => 'MilestoneItemController@deleteMilestone',
    ]);

    //Send email
    Route::get('/send/escrow/milestone-invoice/{uuid}', [
        'as' => 'send.escrow.milestone-invoice',
        'uses' => 'InvoiceController@sendMilestoneEmail'
    ]);

    //Recipient Accepts invoice
    Route::match(['GET', 'POST'], '/recipient.accept/invoice/{uuid}', [
        'as' => 'recipient.accept',
        'uses' => 'InvoiceController@recipientAcceptMsInvoice'
    ]);

    //Recipient Reviews invoice
    Route::get('/invoice/reviewms/{uuid}', [
        'as' => 'invoice.show.reviewms',
        'uses' => 'InvoiceController@reviewMSInvoice'
    ]);

    /***MILESTONE INVOICE ENDS**/

    /**TRANSACTIONS BEGINS**/
    Route::get('/transactions/', [
        'as' => 'transactions.show.index',
        'uses' => 'TransactionController@getIndex', 
        'middleware' => 'auth', 'accesslogin',
    ]);

    //  Show preview of Basic Invoice
    Route::get('/transactions/key/{uuid}', [
        'as' => 'transactions.show.key',
        'uses' => 'TransactionController@getTransKey',
        'middleware' => 'auth', 'accesslogin',
    ]);

    Route::match(['GET', 'POST'], '/supply/key/invoice/{uuid}', [
        'as' => 'supply.key',
        'uses' => 'TransactionController@supplyTransKey' ,
        'middleware' => 'auth', 'accesslogin',
    ]);

    Route::match(['GET', 'POST'], '/sender/confirm/invoice/{uuid}', [
        'as' => 'sender.confirm',
        'uses' => 'TransactionController@senderConfirmInvoice', 
        'middleware' => 'auth', 'accesslogin',
    ]);
    Route::match(['GET', 'POST'], '/recipient/confirm/invoice/{uuid}', [
        'as' => 'recipient.confirm',
        'uses' => 'TransactionController@recipientConfirmInvoice',
        'middleware' => 'auth', 'accesslogin', 
    ]);

    //Milestone Transactions
    Route::get('/transactions/milestones', [
        'as' => 'transactions.show.milestones',
        'uses' => 'TransactionController@getMilestones', 
        'middleware' => 'auth', 'accesslogin',
    ]);
    //Sender confirms milestone
    Route::match(['GET', 'POST'], '/senderms/confirm/invoice/{uuid}', [
        'as' => 'senderms.confirm',
        'uses' => 'TransactionController@senderConfirmMs', 
        'middleware' => 'auth', 'accesslogin',
    ]);
    //Recipient confirms milestone
    Route::match(['GET', 'POST'], '/recipientms/confirm/invoice/{uuid}', [
        'as' => 'recipientms.confirm',
        'uses' => 'TransactionController@recipientConfirmMs',
        'middleware' => 'auth', 'accesslogin', 
    ]);

    /**TRANSACTIONS ENDS**/

    /*** INVOICE REVIEWS BEGINS ****/
  
      //  Show current Invoice
    Route::get('/reviews/create/{uuid}', [
        'as' => 'reviews.show.create',
        'uses' => 'ReviewsController@showReviewPage'
    ]);

    //Add Reviews to it
    Route::post('/reviews/create/{uuid}', [
        'as' => 'review.save',
        'uses' => 'ReviewsController@createReview',
    ]);
    /*** INVOICE REVIEWS ENDS ****/



    /*** DISPUTE BEGINS ****/
    Route::get('/disputes/',[
        'as' => 'disputes.show.index',
        'uses' => 'DisputeController@index'
    ]);

    Route::get('/disputes/create/{uuid}', [
        'as' => 'disputes.show.create',
        'uses' => 'DisputeController@showDispute'
    ]);

    Route::post('/dispute/save', [
        'as' => 'dispute.save',
        'uses' => 'DisputeController@saveDispute',
    ]);

    Route::post('/dispute/update/{uuid}', [
        'as' => 'dispute.update',
        'uses' => 'DisputeController@updateDispute',
    ]);

    Route::post('/dispute/resolve/{uuid}', [
        'as' => 'dispute.resolve',
        'uses' => 'DisputeController@disputeResolved',
    ]);

    /*** DISPUTE COMMENT BEGINS ****/
    Route::post('/dispute/create/{uuid}', [
        'as' => 'comment.save',
        'uses' => 'CommentsController@createComment',
    ]);

    /**Save Bank Details**/
    Route::post('/bank/create/', [
        'as' => 'bank.save',
        'uses' => 'BankdetailController@create',
    ]);

    /**Save Payout Details and send mail to admin**/
    Route::post('/payout/create/', [
        'as' => 'payout.save',
        'uses' => 'PayoutController@initiateWithdrawal',
    ]);
});

    
