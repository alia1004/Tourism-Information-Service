/* Base styling for body */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4; /* Light background */
    color: #333; /* Dark text color */
    margin: 0;
    padding: 20px;
}

/* Header styling */
h1 {
    text-align: center;
    font-size: 2.5em;
    color: #007bff; /* Bootstrap primary color */
    margin-bottom: 20px;
}

/* Container for images */
.images {
    display: flex;
    flex-direction: column; /* Aligns items vertically */
    align-items: center; /* Center items */
}

/* Destination box styling */
.destination {
    background-color: #fff; /* White background for destination box */
    border-radius: 8px; /* Rounded corners */
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
    padding: 20px; /* Padding inside the box */
    margin: 10px 0; /* Margin around each destination box */
    width: 100%; /* Full width */
    max-width: 800px; /* Max width */
}

/* Image styling */
.destination img {
    width: 100%; /* Responsive image */
    border-radius: 8px; /* Rounded corners for image */
}

/* Destination name styling */
.destination h2 {
    font-size: 1.8em;
    color: #007bff; /* Bootstrap primary color */
    margin: 10px 0;
}

/* Star rating styling */
.stars {
    font-size: 30px;
    margin: 10px 0;
}

/* Individual star styling */
.star {
    cursor: pointer;
    margin: 0 5px;
}

/* Selected star color */
.star.selected {
    color: #FFD700; /* Gold color for selected stars */
}

/* Paragraph styling */
p {
    line-height: 1.6; /* Increased line height for readability */
    margin: 10px 0; /* Margin for paragraphs */
}

/* Unordered list styling */
ul {
    margin: 10px 0; /* Margin around list */
    padding-left: 20px; /* Indent list items */
}

/* Location heading styling */
h3 {
    margin: 15px 0 10px; /* Margin for location heading */
}

/* Iframe styling for Google Maps */
iframe {
    border-radius: 8px; /* Rounded corners for iframe */
    margin-top: 10px; /* Margin on top of iframe */
    width: 100%; /* Responsive iframe */
    max-width: 600px; /* Max width for iframe */
    height: 450px; /* Height for iframe */
}
