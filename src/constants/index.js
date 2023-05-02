import {
    tutor,
    java,
    web,
    videogame,
    javascript,
    html,
    css,
    reactjs,
    tailwind,
    oxford,
    concordia,
    unity,
    website,
    adoptionsite,
    prochainestation,
    arduino,
    threejs,
    php,
    bootstrap5,
    python,
    csharp,
    unityengine,
    assembly,
  } from "../assets";
  
  export const navLinks = [
    {
      id: "about",
      title: "About",
    },
    {
      id: "work",
      title: "Work",
    },
    {
      id: "contact",
      title: "Contact",
    },
  ];
  
  const services = [
    {
      title: "Web Developer",
      icon: web,
    },
    {
      title: "Java Developer",
      icon: java,
    },
    {
      title: "Video Game Developer",
      icon: videogame,
    },
    {
      title: "Math Tutor",
      icon: tutor,
    },
  ];
  
  const technologies = [
    {
      name: "HTML 5",
      icon: html,
    },
    {
      name: "CSS 3",
      icon: css,
    },
    {
      name: "JavaScript",
      icon: javascript,
    },
    {
      name: "PHP",
      icon: php,
    },
    {
      name: "React JS",
      icon: reactjs,
    },
    {
      name: "Bootstrap 5",
      icon: bootstrap5,
    },
    {
      name: "Tailwind CSS",
      icon: tailwind,
    },
    {
      name: "Python",
      icon: python,
    },
    {
      name: "C#",
      icon: csharp,
    },
    {
      name: "Unity Engine",
      icon: unityengine,
    },
    {
      name: "Three JS",
      icon: threejs,
    },
    {
      name: "x86 Assembly",
      icon: assembly,
    },
  ];
  
  const experiences = [
    {
      title: "Beginning of B.Eng in SOEN",
      company_name: "Concordia University",
      icon: concordia,
      iconBg: "#383E56",
      date: "September 2022 - Present",
      points: [
        "During my first two semesters in the software engineering program, I completed relevant coursework in Discrete Mathematics, Object-Oriented Programming I and II, Web Programming, and Professional Ethics and Responsibility.",
        "The software engineering program at [university name] provided me with a strong foundation in various programming languages and technologies, such as Java and web development.",
        "Through coursework such as Professional Ethics and Responsibility, I gained an understanding of the ethical considerations involved in the software engineering industry.",
        "With a focus on hands-on experience, I was able to apply my knowledge in various projects and assignments, helping me develop practical skills in software development.",
      ],
    },
    {
      title: "First Game Completed",
      company_name: "Personal Project",
      icon: unity,
      iconBg: "#E6DEDD",
      date: "Feb 2023 - Apr 2022",
      points: [
        "Developed a horror game in Unity Engine as my first solo project with a colleague.",
        "Implemented key gameplay mechanics such as player movement and enemy AI.",
        "Created an immersive atmosphere through sound design and level design.",
        "Utilized various programming techniques such as object pooling and event-driven programming to optimize game performance.",
      ],
    },
    {
      title: "First Website Completed",
      company_name: "School Project",
      icon: website,
      iconBg: "#383E56",
      date: "Jan 2022 - Jan 2023",
      points: [
        "Developed a website as part of a school project using PHP, CSS, HTML, and JS.",
        "Utilized PHP to create dynamic web pages and forms for user input.",
        "Designed the website layout using Bootstrap 5 and HTML for optimal user experience.",
        "Implemented JS scripts for client-side validation and dynamic page elements.",
      ],
    },
    {
      title: "Math/Science Tutor",
      company_name: "Oxford Learning Centres Ltd.",
      icon: oxford,
      iconBg: "#E6DEDD",
      date: "September 2022 - Present",
      points: [
        "Tutored high school students in various subjects at a tutoring center.",
        "Developed and enhanced lesson plans to help students improve their grades and understanding of the material.",
        "Conducted regular assessments to track students' progress and identify areas for improvement.",
        "Collaborated with other tutors and center managers to ensure that each student received the support they needed to succeed.",
      ],
    },
  ];
  
  const projects = [
    {
      name: "Pet Adoption Website",
      description:
        "A pet adoption website created using a combination of PHP, CSS, HTML, and Bootstrap 5. It offers a comprehensive platform for users to search for pets based on various criteria, such as breed, friendliness with humans/other pets, age, and more. Users can create an account and either search or submit pets of their own.",
      tags: [
        {
          name: "Bootstrap 5",
          color: "purple-text-gradient",
        },
        {
          name: "HTML",
          color: "orange-text-gradient",
        },
        {
          name: "CSS",
          color: "blue-text-gradient",
        },
        {
          name: "JavaScript",
          color: "yellow-text-gradient",
        },
      ],
      image: adoptionsite,
      source_code_link: "https://users.encs.concordia.ca/~pa_nir/Q4_project/",
    },
    {
      name: "Horror Game",
      description:
        "A horror game was built using C# and the Unity Engine, along with lowpoly blender models. Learned to program the fundamental mechanics of a game, including player movement and enemy AI.",
      tags: [
        {
          name: "Csharp",
          color: "purple-text-gradient",
        },
        {
          name: "UnityEngine",
          color: "green-text-gradient",
        },
        {
          name: "Blender",
          color: "pink-text-gradient",
        },
      ],
      image: prochainestation,
      source_code_link: "https://github.com/getll/HauntedMetro",
    },
    {
      name: "Obstacle Course Cart",
      description:
        "Semi-automatic robotic cart made using sensors and an Arduino UNO microcontroller. Fundmanetal C++ principles were used to program the cart to make use of three sensors (ultrasonic, infrared and color) and maneuver around an obstacle course.",
      tags: [
        {
          name: "Arduino",
          color: "blue-text-gradient",
        },
        {
          name: "C++",
          color: "green-text-gradient",
        },
        {
          name: "Circuitry",
          color: "pink-text-gradient",
        },
      ],
      image: arduino,
      source_code_link: "https://github.com/Niravanaa/ArduinoCart",
    },
  ];
  
  export { services, technologies, experiences, projects };
  