  <nav id="sidebar" class="sidebar js-sidebar">
      <div class="sidebar-content js-simplebar">
          <a class="sidebar-brand" href="/dashboard">
              <span class="align-middle">Main</span>
          </a>

          <ul class="sidebar-nav">
              <li class="sidebar-header">
                  Pages
              </li>

              <li class="sidebar-item active">
                  <a class="sidebar-link " href="{{ route('categories.index')}}">
                      <i class="align-middle " data-feather="layers"></i> <span class="align-middle">Categories</span>
                  </a>
              </li>

              <li class="sidebar-item">
                  <a class="sidebar-link" href="{{route('web.books.index')}}">
                      <i class="align-middle" data-feather="server"></i> <span class="align-middle">books</span>
                  </a>
              </li>            
          </ul>          
      </div>
  </nav>
