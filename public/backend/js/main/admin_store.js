function show_detail_store() {
    console.log(khanhkhanh);
    var output = `<div id="contact-1" class="tab-pane active">
                                 <div class="row m-b-lg">
                                    <div class="col-lg-4 text-center">
                                       <h2>Nicki Smith</h2>
                                       <div class="m-b-sm">
                                       <img alt="image" class="img-circle" src="../backend/img/ronaldo.jpg"
                                       style="width: 62px">
                                       </div>
                                    </div>
                                    <div class="col-lg-8">
                                       <strong>
                                       About me
                                       </strong>
                                       <p>
                                          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                          tempor incididunt ut labore et dolore magna aliqua.
                                       </p>
                                       <button type="button" class="btn btn-primary btn-sm btn-block"><i
                                          class="fa fa-envelope"></i> Send Message
                                       </button>
                                    </div>
                                 </div>
                                 <div class="client-detail">
                                    <div class="full-height-scroll">
                                       <strong>Last activity</strong>
                                       <ul class="list-group clear-list">
                                          <li class="list-group-item">
                                             <span class="pull-right"> 12:00 am </span>
                                             Write a letter to Sandra
                                          </li>
                                       </ul>
                                       <strong>Notes</strong>
                                       <p>
                                          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                          tempor incididunt ut labore et dolore magna aliqua.
                                       </p>
                                       <hr/>
                                       <strong>Timeline activity</strong>
                                    </div>
                                 </div>
                        </div>`

    $('#detail-store').html(output)
}

function show_store() {
    const output = `
                <tr>
                <td class="client-avatar"><img alt="image" src="../backend/img/ronaldo.jpg" > </td>
                <td><a data-toggle="tab" href="#contact-1" class="client-link">Anthony Jackson</a></td>
                <td> Tellus Institute</td>
                <td class="contact-type"><i class="fa fa-envelope"> </i></td>
                <td> gravida@rbisit.com</td>
                <td class="client-status"><button class="label label-primary">Active</button></td>
                </tr>
                `;
    $("#content-store").html(output)
}
$(document).ready(function() {
    show_store();
});