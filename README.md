# detik_test

cara setup API:
1. create database dengan nama "detik_transaction"
2. import file detik_transaction.sql ke dalam database
3. taruh file API / folder detik_test di web service (htdocs)
4. ubah setting connection database di file connection.php sesuai dengan setting yg di gunakan
5. import JSON detik_test_payment.json ke postman / Insomnia / API platform
6. untuk get all data bisa menggunakan endpoint get transaction all data (http://base_url/detik_test/transaction_restapi.php?function=get_transaction_alldata)
7. untuk create data transaction bisa menggunakan endpoint create transaction (http://base_url/detik_test/transaction_restapi.php?function=create_transaction). dengan parameter:
    - invoice_id (integer)
    - item_name (varchar)
    - amount (integer)
    - payment_type (ENUM['virtual_account','credit_card'])
    - customer_name (varchar)
    - merchant_id (varchar)
8. untuk check data status transaction bisa menggunakan endpoint Check transaction (http://base_url/detik_test/transaction_restapi.php?function=get_transaction). dengan parameter:
    - merchant_id (varchar)
    - references_id (varchar)
9. untuk merubah status transaksi, bisa merunning file PHP edit_status (php edit_status.php {references_id} {status}),
    dengan kondisi status Pending,Paid,Failed