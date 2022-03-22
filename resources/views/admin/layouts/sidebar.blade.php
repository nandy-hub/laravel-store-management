<!-- Sidebar -->
    <div class="bg-dark text-white border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">Store </div>
      <div class="list-group list-group-flush">
        <a href="{{url('/adminpanel/dashboard')}}" class="list-group-item list-group-item-action bg-dark text-white">Dashboard</a>
        <a href="#" class="list-group-item list-group-item-action bg-dark text-white">Site Settings</a>
        <a href="#" class="list-group-item list-group-item-action bg-dark text-white">Profile</a>
        <!-- <a href="{{url('adminpanel/all_products')}}" class="list-group-item list-group-item-action bg-dark text-white">Products</a> -->
        <a href="{{url('adminpanel/user_details')}}" class="list-group-item list-group-item-action bg-dark text-white">User Details</a>
        <a href="{{url('adminpanel/order_details')}}" class="list-group-item list-group-item-action bg-dark text-white">Order Details</a>
        <div>
            <a class="list-group-item list-group-item-action bg-dark text-white d-flex justify-content-between align-items-center" data-toggle="collapse" href="#blogs_sections" role="button" aria-expanded="false" aria-controls="blogs_sections">
              Manage Products <i class="fa fa-chevron-down"></i>
            </a>
          </div>
          <div class="collapse" id="blogs_sections">
            <div class="card">
              <div>
                <a href="{{url('adminpanel/view_products_cate')}}" class="list-group-item list-group-item-action">Products Category</a>
                <a href="{{url('adminpanel/view_products')}}" class="list-group-item list-group-item-action">Products</a>
                <!-- <a href="{{url('adminpanel/view_blog_author')}}" class="list-group-item list-group-item-action">View Blog Author</a> -->
              </div>
            </div>
          </div>
        <!-- <div>
            <a class="list-group-item list-group-item-action bg-dark text-white d-flex justify-content-between align-items-center" data-toggle="collapse" href="#manage_meta_sections" role="button" aria-expanded="false" aria-controls="manage_meta_sections">
              Manage Meta Details <i class="fa fa-chevron-down"></i>
            </a>
          </div>
          <div class="collapse" id="manage_meta_sections">
            <div class="card">
              <div>
                <a href="{{url('adminpanel/meta_pages')}}" class="list-group-item list-group-item-action">Meta Pages</a>
                <a href="{{url('adminpanel/meta_content')}}" class="list-group-item list-group-item-action">Meta Content</a>

              </div>
            </div>
          </div> -->
        <a href="{{url('adminpanel/contact_enquiry')}}" class="list-group-item list-group-item-action bg-dark text-white">Contact Enquiry</a>
        <!-- <div>
          <a class="list-group-item list-group-item-action bg-dark text-white" data-toggle="collapse" href="#home_page_sections" role="button" aria-expanded="false" aria-controls="home_page_sections">
            Home Page Sections
          </a>
        </div>
        <div class="collapse" id="home_page_sections">
          <div class="card">
            <div>
              <a href="{{url('adminpanel/trending_products')}}" class="list-group-item list-group-item-action">Trending Products</a>
            </div>
          </div>
        </div> -->
      </div>
    </div>
    <!-- /#sidebar-wrapper -->
