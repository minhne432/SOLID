The Open/Closed Principle (OCP) is one of the SOLID principles of object-oriented design. It states that a class should be open for extension but closed for modification. This means you should be able to extend a class's behavior without modifying its existing code.

### Step-by-Step Guide to Implementing the Open/Closed Principle (OCP) in PHP

#### Scenario

Let's say we want to create a system for calculating the area of different shapes. Initially, we might start with just one shape, but we want to be able to add new shapes in the future without modifying the existing code.

#### Step 1: Define an Interface for Shapes

Create an interface that all shapes will implement. This ensures that each shape can calculate its own area.

```php
interface Shape {
    public function calculateArea(): float;
}
```

#### Step 2: Implement Concrete Shape Classes

Create concrete classes for each shape, implementing the `Shape` interface.

```php
class Rectangle implements Shape {
    private $width;
    private $height;

    public function __construct($width, $height) {
        $this->width = $width;
        $this->height = $height;
    }

    public function calculateArea(): float {
        return $this->width * $this->height;
    }
}

class Circle implements Shape {
    private $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function calculateArea(): float {
        return pi() * pow($this->radius, 2);
    }
}
```

#### Step 3: Use a Shape Manager to Handle Shapes

Create a class to manage a collection of shapes. This class should not need to be modified when new shapes are added.

```php
class ShapeManager {
    private $shapes = [];

    public function addShape(Shape $shape) {
        $this->shapes[] = $shape;
    }

    public function calculateTotalArea(): float {
        $totalArea = 0;
        foreach ($this->shapes as $shape) {
            $totalArea += $shape->calculateArea();
        }
        return $totalArea;
    }
}
```

#### Step 4: Use the Shape Manager

Add shapes to the `ShapeManager` and calculate the total area.

```php
$shapeManager = new ShapeManager();

// Add shapes
$shapeManager->addShape(new Rectangle(5, 10));
$shapeManager->addShape(new Circle(7));

// Calculate and display the total area
echo "Total Area: " . $shapeManager->calculateTotalArea() . "\n";
```

### Full Code Example

Here’s the complete code for clarity:

```php
<?php

interface Shape {
    public function calculateArea(): float;
}

class Rectangle implements Shape {
    private $width;
    private $height;

    public function __construct($width, $height) {
        $this->width = $width;
        $this->height = $height;
    }

    public function calculateArea(): float {
        return $this->width * $this->height;
    }
}

class Circle implements Shape {
    private $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function calculateArea(): float {
        return pi() * pow($this->radius, 2);
    }
}

class ShapeManager {
    private $shapes = [];

    public function addShape(Shape $shape) {
        $this->shapes[] = $shape;
    }

    public function calculateTotalArea(): float {
        $totalArea = 0;
        foreach ($this->shapes as $shape) {
            $totalArea += $shape->calculateArea();
        }
        return $totalArea;
    }
}

// Usage
$shapeManager = new ShapeManager();

// Add shapes
$shapeManager->addShape(new Rectangle(5, 10));
$shapeManager->addShape(new Circle(7));

// Calculate and display the total area
echo "Total Area: " . $shapeManager->calculateTotalArea() . "\n";

?>
```

### Explanation

1. **Shape Interface**:

   - Defines a contract for all shapes with the `calculateArea` method. This ensures that all shape classes adhere to a common interface.

2. **Concrete Shape Classes (Rectangle and Circle)**:

   - Implement the `Shape` interface and provide specific implementations for the `calculateArea` method. These classes can be extended to add new shapes without modifying existing code.

3. **ShapeManager Class**:

   - Manages a collection of `Shape` objects. It can calculate the total area of all shapes in its collection. The `ShapeManager` class adheres to the Open/Closed Principle because it can accommodate new shapes without needing modification.

4. **Usage**:
   - Demonstrates how to create and use the `ShapeManager` class to handle various shapes and calculate their areas.

### Benefits

- **Extensibility**: New shapes can be added without modifying existing classes.
- **Maintainability**: The codebase remains stable and less prone to bugs when extending functionality.
- **Flexibility**: The system can evolve to accommodate new requirements while respecting existing design constraints.

This implementation ensures that the `ShapeManager` class remains closed for modification but open for extension, adhering to the Open/Closed Principle.
