<?php 

    public function orders() {
        if (!isset($_SESSION['user_id'])) {
            redirect('login');
        }
    
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $limit = 5;
        $offset = ($currentPage - 1) * $limit;
    
        $filterStatus = isset($_GET['status']) ? $_GET['status'] : 'all';
    
        $orderModel = new Order();
        $userModel = new UserModel();
        $buyerModel = new BuyerModel();
        $bookModel = new BookModel();
    
        $orderModel->setLimit($limit);
        $orderModel->setOffset($offset);
    
        $baseConditions = ['seller_id' => $_SESSION['user_id']];
    
        if ($filterStatus !== 'all') {
            $baseConditions['order_status'] = $filterStatus;
        }
    
        $count = $orderModel->getOrderStatusCountsBySeller($_SESSION['user_id']);
    
        $allOrders = $orderModel->where($baseConditions);
        $totalOrders = $orderModel->count($baseConditions);
    
        if ($allOrders) {
            foreach ($allOrders as $order) {
                $user = $userModel->first(['id' => $order->buyer_id]);
                $buyer = $buyerModel->first(['user_id' => $order->buyer_id]);
                $order->buyer_name = $user->username ?? 'Unknown';
                $order->buyer_contact = $buyer->phone_number ?? 'N/A';
                $order->book = $bookModel->first(['id' => $order->book_id]);
            }
        }
    
        $totalPages = ceil($totalOrders / $limit);
    
        $this->view('bookstoreOrders', [
            'orders' => $allOrders,
            'count' => $count,
            'currentPage' => $currentPage,
            'totalPages' => $totalPages,
            'filterStatus' => $filterStatus
        ]);
    }