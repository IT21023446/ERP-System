document.addEventListener('DOMContentLoaded', function () {
  const customerForm = document.getElementById('add-customer-form');

  customerForm.addEventListener('submit', function (event) {
    event.preventDefault();

    const firstName = document.getElementById('first-name').value;
    const lastName = document.getElementById('last-name').value;
    const contactNumber = document.getElementById('contact-number').value;

    if (
      firstName.trim() === '' ||
      lastName.trim() === '' ||
      contactNumber.trim() === ''
    ) {
      alert('Please fill in all the required fields.');
    } else {
      const xhr = new XMLHttpRequest();
      xhr.open('POST', 'php/customer.php', true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            console.log(xhr.responseText);
            alert('Customer data added successfully!');
          } else {
            console.error('Error adding customer data.');
          }
        }
      };
      xhr.send(
        'first_name=' +
          encodeURIComponent(firstName) +
          '&last_name=' +
          encodeURIComponent(lastName) +
          '&contact_number=' +
          encodeURIComponent(contactNumber)
      );
    }
  });

  const itemForm = document.getElementById('add-item-form');

  itemForm.addEventListener('submit', function (event) {
    event.preventDefault();

    const itemCode = document.getElementById('item-code').value;
    const itemName = document.getElementById('item-name').value;
    const itemCategory = document.getElementById('item-category').value;
    const itemSubCategory = document.getElementById('item-subcategory').value;
    const quantity = document.getElementById('quantity').value;
    const unitPrice = document.getElementById('unit-price').value;

    if (
      itemCode.trim() === '' ||
      itemName.trim() === '' ||
      quantity.trim() === '' ||
      unitPrice.trim() === ''
    ) {
      alert('Please fill in all the required fields.');
    } else {
      const xhr = new XMLHttpRequest();
      xhr.open('POST', 'php/item.php', true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            console.log(xhr.responseText);
            alert('Item data added successfully!');
          } else {
            console.error('Error adding item data.');
          }
        }
      };
      xhr.send(
        'item_code=' +
          encodeURIComponent(itemCode) +
          '&item_name=' +
          encodeURIComponent(itemName) +
          '&item_category=' +
          encodeURIComponent(itemCategory) +
          '&item_subcategory=' +
          encodeURIComponent(itemSubCategory) +
          '&quantity=' +
          encodeURIComponent(quantity) +
          '&unit_price=' +
          encodeURIComponent(unitPrice)
      );
    }
  });
});
